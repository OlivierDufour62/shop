<?php

namespace App\Controller;

use App\Entity\Addresses;
use App\Entity\Categories;
use App\Entity\Users;
use App\Form\CategoriesType;
use App\Form\UsersType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AdminController extends AbstractController
{

    /**
     * @Route("/api/addcat", name="api_add_cat", methods={"POST"})
     */
    public function addCategories(Request $request, SerializerInterface $serializer)
    {
        $cat = $request->getContent();
        $addCat = $serializer->deserialize($cat, Categories::class, 'json');
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($addCat);
        $entityManager->flush();
        return $this->json($addCat, 200, [], ['groups' => 'cat']);
    }

    /**
     * @Route("/api/editcat/{id}", name="api_edit_cat", methods={"PUT"})
     */
    public function editCategories(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $category = $entityManager->getRepository(Categories::class)
            ->find($id);
        $data = json_decode($request->getContent(), true);
        $form = $this->createForm(CategoriesType::class, $category);
        $form->submit($data);
        $entityManager->persist($category);
        $entityManager->flush();
        return $this->json($data, 200, [], ['groups' => 'cat']);
    }

    /**
     * @Route("/api/listcat", name="api_list_cat", methods={"GET"})
     */
    public function listCat()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $categories = $entityManager->getRepository(Categories::class)
            ->findAll();
        return $this->json($categories, 200, [], ['groups' => 'cat']);
    }
}
