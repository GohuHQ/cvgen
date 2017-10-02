<?php

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $name = "Hugo";
        $age = "26";
        $aboutMe = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, non, dolorem, cumque distinctio magni quam expedita velit laborum sunt amet facere tempora ut fuga aliquam ad asperiores voluptatem dolorum! Quasi.";

        $contact = [
            "phone" => "06 72 39 62 85",
            "email" => "hquezada@hq-info.fr",
            "github" => "https://github.com/GohuHQ/",
            "linkedin" => "https://www.linkedin.com/in/hugo-quezada-a3b2493b"
        ];

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

        $skills = [
            [
                "label" => "HTML",
                "percent" => "1.00"
            ],
            [
                "label" => "CSS",
                "percent" => "0.90"
            ],
            [
                "label" => "PHP",
                "percent" => "1.00"
            ],
            [
                "label" => "jQuery",
                "percent" => "0.70"
            ]
        ];

        $languages = [
            [
                "label" => "Spanish",
                "percent" => "0.80"
            ],
            [
                "label" => "English",
                "percent" => "0.60"
            ]
        ];

        $hobbies = [
            "Cycle",
            "Beer",
            "Programming"
        ];

        return $this->render('front/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            "name" => $name,
            "age" => $age,
            'about_me' => $aboutMe,
            'contact' => $contact,
            'education' => $education,
            'experiences' => $experiences,
            'skills' => $skills,
            'languages' => $languages,
            'hobbies' => $hobbies
        ]);
    }
}
