<?php

namespace App\Controller\Admin\Joystick;

use App\Entity\Joystick\Joystick;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class JoystickCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Joystick::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('orientation'),
            AssociationField::new('brand'),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
            CollectionField::new('keys')->useEntryCrudForm(),
            ImageField::new('imageName')
                 ->setBasePath('/uploads/joystick')
                 ->hideOnForm()
            ,
            Field::new('imageFile')
                 ->setFormType(VichImageType::class)
                 ->onlyOnForms()
            ,
        ];
    }
}
