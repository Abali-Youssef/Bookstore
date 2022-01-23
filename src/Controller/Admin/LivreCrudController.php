<?php

namespace App\Controller\Admin;

use App\Entity\Livre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;


class LivreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Livre::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('isbn'),
            TextField::new('titre'),
            TextField::new('description'),
            AssociationField::new('genres'),
            AssociationField::new('auteurs'),
            
            DateField::new('date_de_parution'),
            IdField::new('nombre_pages'),
            IdField::new('note'),

        ];
    }
    
}
