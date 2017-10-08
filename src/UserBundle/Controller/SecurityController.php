<?php

namespace UserBundle\Controller;

use AppBundle\Entity\Person;
use UserBundle\Entity\User;
use UserBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request)
    {
        if($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED'))
        {
            return $this->redirectToRoute('index');
        }

        $authUtils = $this->get('security.authentication_utils');

        return $this->render('back/login.html.twig', [
            'last_username' => $authUtils->getLastUsername(),
            'error' => $authUtils->getLastAuthenticationError()
        ]);
    }

    /**
     * @Route("/register", name="register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user, [
            'action' => $this->generateUrl('register'),
            'attr' => ['class' => 'form-horizontal form-material']
        ]);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setIsActive(true);

            $em = $this->getDoctrine()->getManager();

            $person = new Person();
            $em->persist($person);
            $user->setPerson($person);

            $em->persist($user);

            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'The user has been created');

            return $this->redirectToRoute("login");
        }

        return $this->render('back/register.html.twig', [
            'form' => $form->createView()
        ]);
    }


}