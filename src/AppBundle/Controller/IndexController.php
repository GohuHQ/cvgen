<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $aboutMe = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi.";

        $education = [
            [
                "date" => "2005",
                "title" => "Secondary school specializing in artistic",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, exercitationem, totam, dolores iste dolore est aut modi."
            ],
            [
                "date" => "2012",
                "title" => "Second level graduation in Graphic Design",
                "description" => "Eos, explicabo, nam, tenetur et ab eius deserunt aspernatur ipsum ducimus quibusdam quis voluptatibus."
            ]
        ];

        $experiences = [
            [
                "entreprise" => "Google",
                "date" => "2013-2014",
                "title" => "Front-end developer / php programmer",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, et, illum perferendis veritatis velit sunt similique qui magni totam harum tempore eius laboriosam accusantium necessitatibus voluptatum? Enim, itaque dignissimos quia.
"
            ],
            [
                "entreprise" => "Twitter",
                "date" => "2012",
                "title" => "Web Developer",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, nihil sit nemo voluptatem praesentium. Quia, qui facere consectetur libero asperiores fugiat consequuntur deserunt culpa repudiandae sed quidem voluptas explicabo soluta."
            ]
        ];

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'about_me' => $aboutMe,
            'education' => $education,
            'experiences' => $experiences
        ]);
    }
}
