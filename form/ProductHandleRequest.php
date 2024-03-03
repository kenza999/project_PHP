<?php
namespace Form;

use Service\Session as Sess;
use Model\Entity\Product;
use Model\Repository\ProductRepository;

class ProductHandleRequest extends BaseHandleRequest
{
    private $productRepository;

    public function __construct()
    {
        $this->productRepository  = new ProductRepository;
    }

    public function handleInsertForm(Product $product)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            extract($_POST);
            $errors = [];
            // Vérification de la validité du formulaire
            if (empty($title)) {
                $errors[] = "Le nom ne peut pas être vide";
            }
            if (strlen($title) < 4) {
                $errors[] = "Le nom doit avoir au moins 4 caractères";
            }
            if (strlen($title) > 20) {
                $errors[] = "Le nom ne peut avoir plus de 20 caractères";
            }

            if (!strpos($reference, " ") === false) {
                $errors[] = "Les espaces ne sont pas autorisés pour la référence";
            }

            if (!(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK)) {
                $errors[] = "Veuillez sélectionner une image à télécharger pour continuer.";
            }
            // Est-ce que la référence existe déjà dans la bdd ?

            // $productExists = $this->productRepository->checkProductExist([$reference]);
            $productExists = $this->productRepository->findByAttributes($product, ['reference' =>$reference]);
            
            if ($productExists) {
                $errors[] = "La référenc existe déjà, veuillez en choisir une nouvelle";
            }
            if (!is_numeric($price)) {
                $errors[] = "Le prix doit avoir une valeur numérique";
            }
            if (empty($price)) {                
                $errors[] = "Le prix ne peut pas être vide";
            }
            if (!is_numeric($stock)) {
                $errors[] = "Le stock doit avoir une valeur numérique";
            }
            if (empty($stock)) {                
                $errors[] = "Le stock ne peut pas être vide";
            }
            if (empty($cat_id)) {
                $errors[] = "La category ne peut pas être vide";
            }

            if (empty($errors)) {
                $product->setTitle($title);
                $product->setDescription($description ?? null);
                $product->setReference($reference);
                $product->setPrice($reference);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setcategoryId($cat_id);
                return $this;
            }

            $this->setEerrorsForm($errors);
            return $this;
        }
    }
    public function handleEditForm(Product $product)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            extract($_POST);
            $errors = [];
            // Vérification de la validité du formulaire
            if (empty($title)) {
                $errors[] = "Le nom ne peut pas être vide";
            }
            if (strlen($title) < 4) {
                $errors[] = "Le nom doit avoir au moins 4 caractères";
            }
            if (strlen($title) > 20) {
                $errors[] = "Le nom ne peut avoir plus de 20 caractères";
            }

            if (!strpos($reference, " ") === false) {
                $errors[] = "Les espaces ne sont pas autorisés pour la référence";
            }

            if (!(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK)) {
                $errors[] = "Veuillez sélectionner une image à télécharger pour continuer.";
            }
            // Est-ce que la référence existe déjà dans la bdd ?

            // $productExists = $this->productRepository->checkProductExist([$reference]);
            $productExists = $this->productRepository->findByAttributes($product, ['reference' =>$reference]);
            
            if ($productExists) {
                $errors[] = "La référenc existe déjà, veuillez en choisir une nouvelle";
            }
            if (!is_numeric($price)) {
                $errors[] = "Le prix doit avoir une valeur numérique";
            }
            if (empty($price)) {                
                $errors[] = "Le prix ne peut pas être vide";
            }
            if (!is_numeric($stock)) {
                $errors[] = "Le stock doit avoir une valeur numérique";
            }
            if (empty($stock)) {                
                $errors[] = "Le stock ne peut pas être vide";
            }
            if (empty($cat_id)) {
                $errors[] = "La category ne peut pas être vide";
            }

            if (empty($errors)) {
                $product->setTitle($title);
                $product->setDescription($description ?? null);
                $product->setReference($reference);
                $product->setPrice($reference);
                $product->setPrice($price);
                $product->setStock($stock);
                $product->setcategoryId($cat_id);
                return $this;
            }

            $this->setEerrorsForm($errors);
            return $this;
        }
    }
}