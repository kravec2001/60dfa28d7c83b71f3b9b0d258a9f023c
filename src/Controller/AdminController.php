<?php


namespace App\Controller;

use App\Entity\PsbUser;
use App\Entity\Role;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{

    /**
     * @Route("/admin", name="admin")
     */
    public function adminMain(): Response
    {
        return $this->redirectToRoute('admin_card');
    }

    /**
     * @Route("/admin/card", name="admin_card")
     */
    public function adminCard(): Response
    {
        $this->denyAccessUnlessGranted(Role::ADMIN);

        /** @var User $user */
        $user = $this->getUser();

        return $this->render('user/card.html.twig', [
            'title' => 'Карта руководителя',
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl('admin'),
                    'name' => 'Кабинет руководителя',
                ],
                [
                    'name' => 'Карта руководителя',
                ],
            ],
        ]);
    }



}