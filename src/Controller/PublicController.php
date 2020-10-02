<?php

namespace App\Controller;

use App\Entity\Addresses;
use App\Entity\Users;
use App\Form\UsersType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PublicController extends AbstractController
{
    /**
     * @Route("/api/users", name="api_users", methods={"POST"})
     */
    public function addUserAction(Request $request, SerializerInterface $serializer)
    {
        $users = $request->getContent();
        $addedUsers = $serializer->deserialize($users, Users::class, 'json');
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($addedUsers);
        $entityManager->flush();
        // return $this->json($addedUsers, 200, [], ['groups' => 'users', 'groups' => 'address']);
    }

    /**
     * @Route("/api/readusers/{id}", name="api_read_users", methods={"GET"})
     */
    public function readUserAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $users = $entityManager->getRepository(Users::class)
            ->find($id);
        return $this->json($users, 200, [], ['groups' => ['users', 'address']]);
    }

    /**
     * @Route("/api/editusers/{id}", name="api_edit_users", methods={"PUT"})
     */
    public function editUserAction($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $users = $entityManager->getRepository(Users::class)
            ->find($id);
        $data = json_decode($request->getContent(), true);
        dd($data);
        $form = $this->createForm(UsersType::class, $users);
        $form->submit($data);
        $em = $this->getDoctrine()->getManager();
        $em->persist($users);
        $em->flush();
        return $this->json($data, 200, [], ['groups' => ['users', 'address']]);
    }
}
