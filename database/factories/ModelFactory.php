<?php

use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;


/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

/* $factory->define(App\Administrateur::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
}); */

$factory->define(App\Administrateur::class, function (Faker\Generator $faker) {
    $role_id = App\Role::where('name','Administrateur')->first()->id;
    return [
        'matricule' => "ADMIN".$faker->word,
        'users_id' => function () use($role_id) {
             return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
    ];
});


/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

/* $factory->define(App\Agent::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
}); */

$factory->define(App\Agent::class, function (Faker\Generator $faker) {
    $role_id=App\Role::where('name','Agent')->first()->id;
    return [
        'matricule' => "AGT".$faker->word,
        'users_id' => function () use($role_id) {
             return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
    ];
});

/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Agrement::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'details' => $faker->word,
        'compteurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
        'gestionnaires_id' => function () {
            return factory(App\Gestionnaire::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Arrondissement::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'nom' => $faker->word,
        'departements_id' => function () {
            return factory(App\Departement::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Beneficiaire::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'cin' => $faker->word,
        'village_id' => function () {
            return factory(App\Village::class)->create()->id;
        },
        'gestionnaires_id' => function () {
            return factory(App\Gestionnaire::class)->create()->id;
        },
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\BeneficiairesHasFormation::class, function (Faker $faker) {
    return [
        'formations_id' => function () {
            return factory(App\Formation::class)->create()->id;
        },
        'beneficiaires_id' => function () {
            return factory(App\Beneficiaire::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Commune::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'nom' => $faker->word,
        'arrondissements_id' => function () {
            return factory(App\Arrondissement::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Comptable::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Departement::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'nom' => $faker->word,
        'regions_id' => function () {
            return factory(App\Region::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Domaine::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\DomainesHasOperateur::class, function (Faker $faker) {
    return [
        'operateurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
        'domaines_id' => function () {
            return factory(App\Domaine::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Facture::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'date_limite' => $faker->dateTime(),
        'details' => $faker->word,
        'montant' => $faker->randomFloat(),
        'debut_consommation' => $faker->dateTime(),
        'fin_consommation' => $faker->dateTime(),
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Formation::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'date' => $faker->dateTime(),
        'valeur' => $faker->word,
        'compteurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
        'factures_id' => function () {
            return factory(App\Facture::class)->create()->id;
        },
        'agents_id' => function () {
            return factory(App\Agent::class)->create()->id;
        },
        'name' => $faker->name,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

/* $factory->define(App\Gestionnaire::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
}); */

$factory->define(App\Gestionnaire::class, function (Faker\Generator $faker) {
    $role_id=App\Role::where('name','Gestionnaire')->first()->id;
    return [
        'matricule' => "GEST".$faker->word,
        'users_id' => function () use($role_id) {
             return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
    ];
});

/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Module::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
        'domaines_id' => function () {
            return factory(App\Domaine::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\ModulesHasOperateur::class, function (Faker $faker) {
    return [
        'operateurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
        'modules_id' => function () {
            return factory(App\Module::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Operateur::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'numero_agrement' => $faker->word,
        'administrateurs_id' => function () {
            return factory(App\Administrateur::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Region::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'nom' => $faker->word,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Reglement::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'date' => $faker->dateTime(),
        'montant' => $faker->randomFloat(),
        'types_id' => function () {
            return factory(App\Type::class)->create()->id;
        },
        'factures_id' => function () {
            return factory(App\Facture::class)->create()->id;
        },
        'comptables_id' => function () {
            return factory(App\Comptable::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
    //    /*  'uuid' => $faker->uuid, */
        'name' => $faker->name,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Type::class, function (Faker $faker) {
    return [
    //    /*  'uuid' => $faker->uuid, */
        'name' => $faker->name,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

/* $factory->define(App\User::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'firstname' => $faker->firstName,
        'name' => $faker->name,
        'telephone' => $faker->word,
        'email' => $faker->safeEmail,
        'email_verified_at' => $faker->dateTime(),
        'password' => bcrypt($faker->password),
        'roles_id' => function () {
            return factory(App\Role::class)->create()->id;
        },
        'remember_token' => Str::random(10),
    ];
}); */

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'civilite' => SnmG::getCivilite(),
        'firstname' => SnmG::getFirstName(),
        'name' => SnmG::getName(),
        'username' => Str::random(7),
        'telephone' => $faker->phoneNumber,
        'email' => Str::random(5).".".$faker->safeEmail,
        'email_verified_at' => $faker->dateTimeBetween(),
        'password' => bcrypt('secret'),

    ];
});


/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Village::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'nom' => $faker->word,
        'chef_id' => $faker->randomNumber(),
        'communes_id' => function () {
            return factory(App\Commune::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Convention::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Courrier::class,  function (Faker\Generator $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'date' => $faker->dateTime(),
        'details' => $faker->word,
        'gestionnaires_id' => function () {
            return factory(App\Gestionnaire::class)->create()->id;
        },
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Detf::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'cin' => $faker->word,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'quartier_id' => function () {
            return factory(App\Quartier::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Quartier::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'nom' => $faker->word,
        'chef_id' => $faker->randomNumber(),
        'communes_id' => function () {
            return factory(App\Commune::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Antenne::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
        'sigle' => $faker->word,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Arrife::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Demande::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
        'lieux_id' => function () {
            return factory(App\Lieux::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\DemandesHasDisponibilite::class, function (Faker $faker) {
    return [
        'disponibilites_id' => function () {
            return factory(App\Disponibilite::class)->create()->id;
        },
        'demandes_id' => function () {
            return factory(App\Demande::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\DemandesHasModule::class, function (Faker $faker) {
    return [
        'modules_id' => function () {
            return factory(App\Module::class)->create()->id;
        },
        'demandes_id' => function () {
            return factory(App\Demande::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Depart::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Direction::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
        'sigle' => $faker->word,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Disponibilite::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'mois' => $faker->word,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Institution::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Interne::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Lieux::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Niveau::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\OperateursHasNiveaux::class, function (Faker $faker) {
    return [
        'niveaux_id' => function () {
            return factory(App\Niveau::class)->create()->id;
        },
        'operateurs_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Programme::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
        'duree' => $faker->word,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Secteur::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
        'sigle' => $faker->word,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Attestation::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'name' => $faker->name,
        'formations_id' => function () {
            return factory(App\Formation::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\DomainesHasDemande::class, function (Faker $faker) {
    return [
        'demandes_id' => function () {
            return factory(App\Demande::class)->create()->id;
        },
        'domaines_id' => function () {
            return factory(App\Domaine::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\EmployeesHasFormationPersonnel::class, function (Faker $faker) {
    return [
        'formation_personnels_id' => function () {
            return factory(App\FormationPersonnel::class)->create()->id;
        },
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Evaluation::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'name' => $faker->name,
        'date' => $faker->dateTime(),
        'formations_id' => function () {
            return factory(App\Formation::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\FormationPersonnel::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'theme' => $faker->word,
        'name' => $faker->name,
        'periode' => $faker->word,
        'date_debut' => $faker->dateTime(),
        'date_fin' => $faker->dateTime(),
        'cout' => $faker->word,
        'lieu' => $faker->word,
        'operateur' => $faker->word,
        'statut' => $faker->word,
        'observation' => $faker->word,
        'gestionnaires_id' => function () {
            return factory(App\Gestionnaire::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Mission::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'name' => $faker->name,
        'account' => $faker->word,
        'reliquat' => $faker->word,
        'montant_total' => $faker->word,
        'destination' => $faker->word,
        'date_debut' => $faker->dateTime(),
        'date_fin' => $faker->dateTime(),
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\MissionsHasEmployee::class, function (Faker $faker) {
    return [
        'employees_id' => function () {
            return factory(App\Employee::class)->create()->id;
        },
        'missions_id' => function () {
            return factory(App\Mission::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Titre::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'numero' => $faker->word,
        'name' => $faker->name,
        'lieu' => $faker->word,
        'categories' => $faker->word,
        'formations_id' => function () {
            return factory(App\Formation::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\AgrementsType::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
        'agrements_id' => function () {
            return factory(App\Agrement::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Pay::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'nom' => $faker->word,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

/* 
$factory->define(App\Gestionnaire::class, function (Faker\Generator $faker) {
    $role_id=App\Role::where('name','Gestionnaire')->first()->id;
    return [
        'matricule' => "GEST".$faker->word,
        'users_id' => function () use($role_id) {
             return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
    ];
});
*/
/* 
$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'titre' => $faker->word,
        'description' => $faker->text,
        'url' => $faker->url,
        'users_id' => $faker->randomNumber(),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
}); */

$factory->define(App\Profile::class, function (Faker\Generator $faker) {
    $user_id= App\User::get()->last()->id;
    return [
        
        'titre' =>"Titre"." ".$faker->word,
        'description' => "",
        'url' => "",
        'image' => "",
        // 'users_id' => $faker->randomNumber(),
        'users_id' => function () use($user_id) {
            return factory(App\Profile::class)->create(["users_id"=>$user_id])->id;
        },
    ];
});

/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Ville::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'nom' => $faker->word,
        'chef_id' => $faker->randomNumber(),
        'communes_id' => function () {
            return factory(App\Commune::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// /* use Faker\Generator as Faker; */

$factory->define(App\Arrive::class, function (Faker\Generator $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
        'courriers_id' => function () {
            return factory(App\Courrier::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// /* use Faker\Generator as Faker; */

$factory->define(App\Poste::class, function (Faker $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'legende' => $faker->word,
        'image' => $faker->word,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// /* use Faker\Generator as Faker; */

$factory->define(App\TypesCourrier::class, function (Faker $faker) {
    return [
        // /* 'uuid' => $faker->uuid, */
        'name' => $faker->name,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

/* $factory->define(App\Sex::class, function (Faker\Generator $faker) {
    return [
        // 'uuid' => $faker->uuid,
        'name' => $faker->name,
    ];
}); */
