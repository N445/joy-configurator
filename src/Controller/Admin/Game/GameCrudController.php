<?php

namespace App\Controller\Admin\Game;

use App\Entity\Game\Game;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class GameCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Game::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
            CollectionField::new('keys')->useEntryCrudForm(),
            ImageField::new('imageName')
                      ->setBasePath('/uploads/game')
                      ->hideOnForm()
            ,
            Field::new('imageFile')
                 ->setFormType(VichImageType::class)
                 ->onlyOnForms()
            ,
        ];
    }
}
