<?php

namespace App\Controller;

use App\Entity\PsbUser;
use App\Entity\Role;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends AbstractController
{
    /**
     * @Route("/user/team", name="user_team")
     * @Route("/user/team/{id}", name="user_team")
     */
    public function user_team($id = null): Response
    {
        $this->denyAccessUnlessGranted(Role::USER);

        /** @var User $user */
        /** @var PsbUser $psbuser */
        $user = $this->getUser();
        $psbuser = $this->getDoctrine()->getRepository(PsbUser::class)->find($user->getId());

        $em = $this->get('doctrine')->getManager();

        $query = $em->createQuery(
            'SELECT p.id, p.fio, p.img, p.phone, p.email, t.name post, d.name depart 
               FROM App\Entity\PsbUser p, 
                    App\Entity\PsbPosts t, 
                    App\Entity\PsbDeparts d               
              WHERE (p.idManager = '.$psbuser->getIdManager().'
              OR p.idUser = '.$psbuser->getIdManager().')
              AND p.idPost = t.idPost
              AND p.idDepart = d.id              
              ORDER BY p.idManager, p.fio
               ');

        $allteam = $query->getResult();

        return $this->render('team/userteam.html.twig', [
            'title' => 'Наша команда',
            'breadcrumbs' => [
                [
                    'url' => $this->generateUrl('user'),
                    'name' => 'Кабинет сотрудника',
                ],
                [
                    'name' => 'Наша команда',
                ],
            ],
            'allteam' => $allteam,
            'return' => (isset($id) ? 1 : 0)
        ]);
    }
}
