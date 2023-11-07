<?php

namespace App\Controller\Admin;

use App\Entity\Joystick\Joystick;
use App\Entity\Joystick\Key;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

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
            CollectionField::new('keys')->useEntryCrudForm(),
        ];
    }
}
