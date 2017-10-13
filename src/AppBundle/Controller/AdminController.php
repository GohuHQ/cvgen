<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Person;
use AppBundle\Entity\Skill;
use AppBundle\Form\PersonType;
use AppBundle\Form\SkillType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{
    /**
     * @Route("/admin/index", name="index")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        return $this->render('back/index.html.twig', [
            'page_title' => 'Resume',
            'breadcrumb_elements' => []
        ]);
    }

    /**
     * @Route("/admin/general/{type}", requirements={"type" = "view|edit"}, name="general")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function generalAction(Request $request, $type)
    {
        $user = $this->getUser();
        $person = $user->getPerson();

        $renderParameters = [
            'page_title' => 'General',
            'breadcrumb_elements' => ['Resume', 'General'],
            'type' => $type,
            'person' => $person,
        ];

        if($type == "edit") {
            $form = $this->createForm(PersonType::class, $person, [
                'action' => $this->generateUrl('general', ['type' => 'edit']),
                'attr' => ['class' => 'form-horizontal']
            ]);
            $renderParameters['form'] = $form->createView();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($person);
                $em->flush();

                $request->getSession()->getFlashBag()->add('success', 'Informations updated successfully');

                return $this->redirectToRoute('general', ['type' => 'view']);
            }
        }

        return $this->render('back/general.html.twig', $renderParameters);
    }

    /**
     * @Route("/admin/education", name="education")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function educationAction(Request $request)
    {
        return $this->render('back/education.html.twig', [
            'page_title' => 'Education',
            'breadcrumb_elements' => ['Resume', 'Education']
        ]);
    }

    /**
     * @Route("/admin/experiences", name="experiences")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function experiencesAction(Request $request)
    {
        return $this->render('back/experiences.html.twig', [
            'page_title' => 'Experiences',
            'breadcrumb_elements' => ['Resume', 'Experiences']
        ]);
    }

    /**
     * @Route("/admin/skills", name="skills")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function skillsAction(Request $request)
    {
        $user = $this->getUser();
        $person = $user->getPerson();

        $skill = new Skill();

        $form = $this->createForm(SkillType::class, $skill, [
            'action' => $this->generateUrl('skills'),
            'attr' => ['class' => 'form-horizontal']
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $skill->setPerson($person);
            $em = $this->getDoctrine()->getManager();
            $em->persist($skill);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'Skills updated successfully');

            return $this->redirectToRoute('skills');
        }

        return $this->render('back/skills.html.twig', [
            'page_title' => 'Skills',
            'breadcrumb_elements' => ['Resume', 'Skills'],
            'skills' => $person->getSkills(),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/languages", name="languages")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function languagesAction(Request $request)
    {
        return $this->render('back/languages.html.twig', [
            'page_title' => 'Languages',
            'breadcrumb_elements' => ['Resume', 'Languages']
        ]);
    }

    /**
     * @Route("/admin/hobbies", name="hobbies")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function hobbiesAction(Request $request)
    {
        return $this->render('back/hobbies.html.twig', [
            'page_title' => 'hobbies',
            'breadcrumb_elements' => ['Resume', 'Hobbies']
        ]);
    }
}