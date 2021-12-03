<?php

namespace App\Controller;

use App\Entity\Role;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Query;

class GridController extends AbstractController
{
    /**
     * @Route("/user/docs", name="user_grid")
     * @Route("/user/docs/{id}", name="user_grid")
     * @Route("/teacher/docs", name="teacher_grid")
     * @Route("/admin/docs", name="admin_grid")
    */
    public function user($id = 0): Response
    {
        if (!$this->isGranted(Role::ADMIN) &&
            !$this->isGranted(Role::TEACHER) &&
            !$this->isGranted(Role::USER)) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('grid/docs.html.twig', [
            'title' => 'Документы',
            'breadcrumbs' => [
                [
                    'url' =>  $this->generateUrl(
                        ($this->isGranted(Role::ADMIN) ? 'admin' :
                            ($this->isGranted(Role::TEACHER) ? 'teacher' : 'user'))
                    ),
                    'name' => 'Кабинет '.($this->isGranted(Role::ADMIN) ? 'руководителя' :
                                         ($this->isGranted(Role::TEACHER) ? 'наставника' : 'пользователя')),
                ],
                [
                    'name' => 'Документы',
                ],
            ],
            'id' => $id,
            'return' => ($id > 0 ? 1 : 0)
        ]);
    }

    /**
     * @Route("/user/grid/ajax", name="user_grid_ajax")
     */
    public function userAjax(): Response
    {
        $this->denyAccessUnlessGranted(Role::USER);

        $id = $_GET['id'];

        $em = $this->get('doctrine')->getManager();

        $query = $em->createQuery(
            'SELECT i.id, i.title, i.dateInfo, i.dataInfo, i.bonus, t.nameType type  
               FROM App\Entity\PsbInfo i, 
                    App\Entity\PsbInfoTypes t                
              WHERE i.typeInfo = t.id and i.typeInfo ' . (($id > 0) ? ' = '.$id : '>0') . '                              
              ORDER BY t.nameType
               ');

        $docs = $query->getArrayResult();
        $docs = array_map(function ($doc) {
            $doc['dateInfo'] = $doc['dateInfo'] instanceof \DateTimeInterface ?
                $doc['dateInfo']->format('d.m.Y H:i') : null;
            return $doc;
        },$docs);

        return new JsonResponse([
            'data' => $docs,
        ]);
    }

    /**
     * @Route("/user/sluch/admin/ajax", name="user_expert_by_sluch_ajax")
     */
    public function userExpertBySluch(Request $request): Response
    {
        $this->denyAccessUnlessGranted(Role::USER);

        $id = $request->get('id', -1);

        if ($id === -1) {
            return new Response('Не задан идентификатор');
        }

        $sluch = $this->getDoctrine()->getRepository(ExpVrach::class)->getExpSluchById($id);

        if ($sluch['status'] = 2) {
            $usl = $this->getDoctrine()->getRepository(ExpVrach::class)->getUslBySluch($id);
            $lek = $this->getDoctrine()->getRepository(ExpVrach::class)->getLekBySluch($id);
        } else {
            $usl = [];
            $lek = [];
        }

        return $this->render('grid/info.html.twig', [
            'data' => $this->getDoctrine()->getRepository(ExpVrach::class)->getExpertBySluch($id),
            'usl' => $usl,
            'lek' => $lek,
        ]);
    }
}
