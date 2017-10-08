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
        $aboutMe = "Passionné d’informatique et auto-entrepreneur depuis avril 2014. Je suis à la recherche de projets me permettant de mettre à contribution mes compétences et d’en acquérir de nouvelle";

        $contact = [
            "phone" => "06 72 39 62 85",
            "email" => "hquezada@hq-info.fr",
            "github" => "https://github.com/GohuHQ/",
            "linkedin" => "https://www.linkedin.com/in/hugo-quezada-a3b2493b"
        ];

        $education = [
            [
                "date" => "2017",
                "title" => "Formation Symfony 3 - Développement Web",
                "description" => "Utilisation et maîtrise de tous les outils majeurs de symfony afin de devenir entièrement autonome avec le framework. Maîtrise du modèle MVC, des formulaires, de l’authentification. Initiation aux tests unitaires et à la gestion du cache HTTP"
            ],
            [
                "date" => "2013",
                "title" => "Licence Développement en Applications Web et Innovation Numérique",
                "description" => "Formation aux méthodes et technologies frontend et backend et aux spécificités des développements web mobile et du multimédia"
            ],
            [
                "date" => "2012",
                "title" => "DUT Informatique",
                "description" => "Formation de technicien supérieur en informatique"
            ]
        ];

        $experiences = [
            [
                "entreprise" => "H&A Location",
                "date" => "Depuis 2014",
                "title" => "Référent technique du pôle informatique",
                "description" => "Prestataire au sein de l’équipe informatique, référent technique chargé de la maintenance et des évolutions de l’ERP et de l’extranet, de l’évolution du framework MVC utilisé vers une logique de fonctionnement plus actuelle et de la refactorisation du code existant avec tests de non régression. Compétences mobilisées : PHP, SQL, Javascript (jQuery, HighCharts), PHPUnit, Git, Docker"
            ],
            [
                "entreprise" => "Les Francas",
                "date" => "2014-2017",
                "title" => "Webmestre de l'application",
                "description" => "Chargé de la maintenance du logiciel de gestion et de suivi des inscriptions, des interactions avec des applications externes et des évolutions. Compétences mobilisées : PHP, SQL, Javascript (jQuery)."
            ],
            [
                "entreprise" => "Aroéven",
                "date" => "2014-2015",
                "title" => "Webmestre de l'application",
                "description" => "Chargé de la maintenance du logiciel de gestion et de suivi de l’activité. Compéteneces mobilisées : PHP, SQL, Javacript"
            ],
            [
                "entreprise" => "DiLaSoft",
                "date" => "2012-2015",
                "title" => "Développeur web",
                "description" => "Stagiaire à deux reprises puis développeur Web au sein de la start-up. Compétences mobilisées : PHP, SQL, Javascript."
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
