<?php

namespace App\Controller\Admin;

use App\Entity\CustomerSuccess;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CustomerSuccessCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CustomerSuccess::class;
    }

    
    // public function configureFields(string $pageName): iterable
    // {
    //     return [
    //         // IdField::new('id'),
    //         // TextField::new('title'),
    //         // TextEditorField::new('description'),
    //         EmailField::new('email', 'Email de connection'),
    //         TextField::new('civilite', 'Civilité'),
    //         TextField::new("prenom", 'Prénom'),
    //         TextField::new("nom", 'Nom'),
    //         TextField::new("telephone", 'Téléphone')
    //     ];
    // }
    
}
