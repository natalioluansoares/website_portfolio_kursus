<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('create-db', function(){
$forge = \Config\Database::forge();
if ($forge->createDatabase('protfolio')) {
    echo 'Database created!';
}
});
$routes->get('{locale}/loginadministrator', 'Loginadministrator::index');
$routes->post('processoadministrator', 'Loginadministrator::processoadministrator');
$routes->get('{locale}/loginadministrator/processologout', 'Loginadministrator::processologout');

$routes->get('{locale}/loginfunsionario', 'Loginfunsionario::index');
$routes->post('processofunsionario', 'Loginfunsionario::processofunsionario');
$routes->get('{locale}/loginfunsionario/processologout', 'Loginfunsionario::processologout');

$routes->get('{locale}/loginprofessores', 'Loginprofessores::index');
$routes->post('processoprofessores', 'Loginprofessores::processoprofessores');
$routes->get('{locale}/loginprofessores/processologout', 'Loginprofessores::processologout');

$routes->get('{locale}/loginestudante', 'Loginestudante::index');
$routes->post('processoestudante', 'Loginestudante::processoestudante');
$routes->get('{locale}/loginestudante/processologout', 'Loginestudante::processologout');



$routes->get('{locale}/homeadministrator', 'Homeadministrator::index');
$routes->get('{locale}/homefunsionario', 'Homefunsionario::index');
$routes->get('{locale}/homeportfolio', 'Homeportfolio::index');
$routes->get('{locale}/homeestudante', 'Homeestudante::index');

$routes->get('administratorlogout', 'Loginadministrator::logout');
$routes->get('funsionariologout', 'Loginfunsionario::logout');
$routes->get('professoreslogout', 'Loginprofessores::logout');
$routes->get('estudantelogout', 'Loginestudante::logout');

// Akun Administrator
$routes->get('{locale}/sedfedwdjakajkjjka3467d2b/accountportfolio', 'Accountportfolio::index');
$routes->get('{locale}/sedfedwdjakajkjjka3467d2b/new/accountportfolio', 'Accountportfolio::new');
$routes->post('{locale}/sedfedwdjakajkjjka3467d2b/create/accountportfolio', 'Accountportfolio::create');
$routes->get('{locale}/sedfedwdjakajkjjka3467d2b/edit/accountportfolio/(:any)', 'Accountportfolio::edit/$1');
$routes->post('{locale}/sedfedwdjakajkjjka3467d2b/update/accountportfolio/(:any)', 'Accountportfolio::update/$1');
$routes->get('{locale}/sedfedwdjakajkjjka3467d2b/image/accountportfolio/(:any)', 'Accountportfolio::image/$1');
$routes->post('{locale}/sedfedwdjakajkjjka3467d2b/processoimage/accountportfolio/(:any)', 'Accountportfolio::processoimage/$1');
$routes->post('{locale}/sedfedwdjakajkjjka3467d2b/delete/accountportfolio', 'Accountportfolio::troka');
$routes->get('{locale}/sedfedwdjakajkjjka3467d2b/hamos/accountportfolio', 'Accountportfolio::hamos');
$routes->get('{locale}/sedfedwdjakajkjjka3467d2b/hamoshotutemporario/accountportfolio', 'Accountportfolio::temporario');
$routes->post('{locale}/sedfedwdjakajkjjka3467d2b/temporario/accountportfolio', 'Accountportfolio::temporario');
$routes->delete('{locale}/sedfedwdjakajkjjka3467d2b/permanente/accountportfolio', 'Accountportfolio::permanente');

// Akun Estudante
$routes->get('{locale}/jeytuahiori8479276490yrukjjsgiih89470javgwpqm894twgjkshb35k09873h/accountestudante', 'Accountestudante::index');
$routes->get('{locale}/jeytuahiori8479276490yrukjjsgiih89470javgwpqm894twgjkshb35k09873h/new/accountestudante', 'Accountestudante::new');
$routes->post('{locale}/jeytuahiori8479276490yrukjjsgiih89470javgwpqm894twgjkshb35k09873h/create/accountestudante', 'Accountestudante::create');
$routes->get('{locale}/jeytuahiori8479276490yrukjjsgiih89470javgwpqm894twgjkshb35k09873h/edit/accountestudante/(:any)', 'Accountestudante::edit/$1');
$routes->post('{locale}/jeytuahiori8479276490yrukjjsgiih89470javgwpqm894twgjkshb35k09873h/update/accountestudante/(:any)', 'Accountestudante::update/$1');
$routes->get('{locale}/jeytuahiori8479276490yrukjjsgiih89470javgwpqm894twgjkshb35k09873h/image/accountestudante/(:any)', 'Accountestudante::image/$1');
$routes->post('{locale}/jeytuahiori8479276490yrukjjsgiih89470javgwpqm894twgjkshb35k09873h/processoimage/accountestudante/(:any)', 'Accountestudante::processoimage/$1');
$routes->post('{locale}/jeytuahiori8479276490yrukjjsgiih89470javgwpqm894twgjkshb35k09873h/delete/accountestudante', 'Accountestudante::troka');
$routes->get('{locale}/jeytuahiori8479276490yrukjjsgiih89470javgwpqm894twgjkshb35k09873h/hamos/accountestudante', 'Accountestudante::hamos');
$routes->get('{locale}/jeytuahiori8479276490yrukjjsgiih89470javgwpqm894twgjkshb35k09873h/hamoshotutemporario/accountestudante', 'Accountestudante::temporario');
$routes->post('{locale}/jeytuahiori8479276490yrukjjsgiih89470javgwpqm894twgjkshb35k09873h/temporario/accountestudante', 'Accountestudante::temporario');
$routes->delete('{locale}/jeytuahiori8479276490yrukjjsgiih89470javgwpqm894twgjkshb35k09873h/permanente/accountestudante', 'Accountestudante::permanente');

// Akun Funsionario
$routes->get('{locale}/edsjh3h4bdj4jsj6jbsb2gdhrs909/funsionarioaccount', 'Funsionarioaccount::index');
$routes->get('{locale}/edsjh3h4bdj4jsj6jbsb2gdhrs909/new/funsionarioaccount', 'Funsionarioaccount::new');
$routes->post('{locale}/edsjh3h4bdj4jsj6jbsb2gdhrs909/create/funsionarioaccount', 'Funsionarioaccount::create');
$routes->get('{locale}/edsjh3h4bdj4jsj6jbsb2gdhrs909/edit/funsionarioaccount/(:any)', 'Funsionarioaccount::edit/$1');
$routes->post('{locale}/edsjh3h4bdj4jsj6jbsb2gdhrs909/update/funsionarioaccount/(:any)', 'Funsionarioaccount::update/$1');
$routes->post('{locale}/edsjh3h4bdj4jsj6jbsb2gdhrs909/delete/funsionarioaccount', 'Funsionarioaccount::troka');
$routes->get('{locale}/edsjh3h4bdj4jsj6jbsb2gdhrs909/image/funsionarioaccount/(:any)', 'Funsionarioaccount::image/$1');
$routes->post('{locale}/edsjh3h4bdj4jsj6jbsb2gdhrs909/processoimage/funsionarioaccount/(:any)', 'Funsionarioaccount::processoimage/$1');
$routes->get('{locale}/edsjh3h4bdj4jsj6jbsb2gdhrs909/hamos/funsionarioaccount', 'Funsionarioaccount::hamos');
$routes->get('{locale}/edsjh3h4bdj4jsj6jbsb2gdhrs909/hamoshotutemporario/funsionarioaccount', 'Funsionarioaccount::temporario');
$routes->post('{locale}/edsjh3h4bdj4jsj6jbsb2gdhrs909/temporario/funsionarioaccount', 'Funsionarioaccount::temporario');
$routes->delete('{locale}/edsjh3h4bdj4jsj6jbsb2gdhrs909/permanente/funsionarioaccount', 'Funsionarioaccount::permanente');


// Akun Professores
$routes->get('{locale}/ydysbfhje34n2b40hsftenap083nhsgatbsl12/teachersaccount', 'Teachersaccount::index');
$routes->get('{locale}/ydysbfhje34n2b40hsftenap083nhsgatbsl12/new/teachersaccount', 'Teachersaccount::new');
$routes->post('{locale}/ydysbfhje34n2b40hsftenap083nhsgatbsl12/create/teachersaccount', 'Teachersaccount::create');
$routes->get('{locale}/ydysbfhje34n2b40hsftenap083nhsgatbsl12/edit/teachersaccount/(:any)', 'Teachersaccount::edit/$1');
$routes->post('{locale}/ydysbfhje34n2b40hsftenap083nhsgatbsl12/update/teachersaccount/(:any)', 'Teachersaccount::update/$1');
$routes->post('{locale}/ydysbfhje34n2b40hsftenap083nhsgatbsl12/delete/teachersaccount', 'Teachersaccount::troka');
$routes->get('{locale}/ydysbfhje34n2b40hsftenap083nhsgatbsl12/image/teachersaccount/(:any)', 'Teachersaccount::image/$1');
$routes->post('{locale}/ydysbfhje34n2b40hsftenap083nhsgatbsl12/processoimage/teachersaccount/(:any)', 'Teachersaccount::processoimage/$1');
$routes->get('{locale}/ydysbfhje34n2b40hsftenap083nhsgatbsl12/hamos/teachersaccount', 'Teachersaccount::hamos');
$routes->get('{locale}/ydysbfhje34n2b40hsftenap083nhsgatbsl12/hamoshotutemporario/teachersaccount', 'Teachersaccount::temporario');
$routes->post('{locale}/ydysbfhje34n2b40hsftenap083nhsgatbsl12/temporario/teachersaccount', 'Teachersaccount::temporario');
$routes->delete('{locale}/ydysbfhje34n2b40hsftenap083nhsgatbsl12/permanente/teachersaccount', 'Teachersaccount::permanente');


// Professores
$routes->get('{locale}/h3hbwbdnk3fwqeaiouagwe78fgjeywqresbag59ah90/professores', 'Professores::index');
$routes->get('{locale}/h3hbwbdnk3fwqeaiouagwe78fgjeywqresbag59ah90/new/professores', 'Professores::new');
$routes->post('{locale}/h3hbwbdnk3fwqeaiouagwe78fgjeywqresbag59ah90/create/professores', 'Professores::create');
$routes->get('{locale}/h3hbwbdnk3fwqeaiouagwe78fgjeywqresbag59ah90/edit/professores/(:any)', 'Professores::edit/$1');
$routes->post('{locale}/h3hbwbdnk3fwqeaiouagwe78fgjeywqresbag59ah90/update/professores/(:any)', 'Professores::update/$1');
$routes->post('{locale}/h3hbwbdnk3fwqeaiouagwe78fgjeywqresbag59ah90/delete/professores', 'Professores::troka');
$routes->get('{locale}/h3hbwbdnk3fwqeaiouagwe78fgjeywqresbag59ah90/hamos/professores', 'Professores::hamos');
$routes->get('{locale}/h3hbwbdnk3fwqeaiouagwe78fgjeywqresbag59ah90/hamoshotutemporario/professores', 'Professores::temporario');
$routes->post('{locale}/h3hbwbdnk3fwqeaiouagwe78fgjeywqresbag59ah90/temporario/professores', 'Professores::temporario');
$routes->delete('{locale}/h3hbwbdnk3fwqeaiouagwe78fgjeywqresbag59ah90/permanente/professores', 'Professores::permanente');


// Funsionario
$routes->get('{locale}/mdnhert36gsljwguio36sg9035bsmklfyurbnsjhgsh/funsionario', 'Funsionario::index');
$routes->get('{locale}/mdnhert36gsljwguio36sg9035bsmklfyurbnsjhgsh/new/funsionario', 'Funsionario::new');
$routes->post('{locale}/mdnhert36gsljwguio36sg9035bsmklfyurbnsjhgsh/create/funsionario', 'Funsionario::create');
$routes->get('{locale}/mdnhert36gsljwguio36sg9035bsmklfyurbnsjhgsh/edit/funsionario/(:any)', 'Funsionario::edit/$1');
$routes->post('{locale}/mdnhert36gsljwguio36sg9035bsmklfyurbnsjhgsh/update/funsionario/(:any)', 'Funsionario::update/$1');
$routes->post('{locale}/mdnhert36gsljwguio36sg9035bsmklfyurbnsjhgsh/delete/funsionario', 'Funsionario::troka');
$routes->get('{locale}/mdnhert36gsljwguio36sg9035bsmklfyurbnsjhgsh/hamos/funsionario', 'Funsionario::hamos');
$routes->get('{locale}/mdnhert36gsljwguio36sg9035bsmklfyurbnsjhgsh/hamoshotutemporario/funsionario', 'Funsionario::temporario');
$routes->post('{locale}/mdnhert36gsljwguio36sg9035bsmklfyurbnsjhgsh/temporario/funsionario', 'Funsionario::temporario');
$routes->delete('{locale}/mdnhert36gsljwguio36sg9035bsmklfyurbnsjhgsh/permanente/funsionario', 'Funsionario::permanente');


// Categorio
$routes->get('{locale}/msrtsdfawrtygh548ens3YsbPmsma7TalHsOia/categorio', 'Categorio::index');
$routes->get('{locale}/msrtsdfawrtygh548ens3YsbPmsma7TalHsOia/new/categorio', 'Categorio::new');
$routes->get('{locale}/msrtsdfawrtygh548ens3YsbPmsma7TalHsOia/hamos/categorio', 'Categorio::hamos');
$routes->get('{locale}/msrtsdfawrtygh548ens3YsbPmsma7TalHsOia/edit/categorio/(:any)', 'Categorio::edit/$1');
$routes->post('{locale}/msrtsdfawrtygh548ens3YsbPmsma7TalHsOia/create/categorio', 'Categorio::create');
$routes->post('{locale}/msrtsdfawrtygh548ens3YsbPmsma7TalHsOia/update/categorio/(:any)', 'Categorio::update/$1');
$routes->post('{locale}/msrtsdfawrtygh548ens3YsbPmsma7TalHsOia/delete/categorio', 'Categorio::troka');
$routes->get('{locale}/msrtsdfawrtygh548ens3YsbPmsma7TalHsOia/hamoshotutemporario/categorio', 'Categorio::temporario');
$routes->post('{locale}/msrtsdfawrtygh548ens3YsbPmsma7TalHsOia/temporario/categorio', 'Categorio::temporario');
$routes->delete('{locale}/msrtsdfawrtygh548ens3YsbPmsma7TalHsOia/permanente/categorio', 'Categorio::permanente');


// Esperiensia
$routes->get('{locale}/yuebhsjwiyabkepklwm34u72nh9932hk897362jlsnu3/esperiensia/(:any)', 'Esperiensia::esperiensia/$1');
$routes->get('{locale}/yuebhsjwiyabkepklwm34u72nh9932hk897362jlsnu3/new/esperiensia', 'Esperiensia::new');
$routes->get('{locale}/yuebhsjwiyabkepklwm34u72nh9932hk897362jlsnu3/hamos/esperiensia/(:any)', 'Esperiensia::hamos/$1');
$routes->get('{locale}/yuebhsjwiyabkepklwm34u72nh9932hk897362jlsnu3/edit/esperiensia/(:any)/(:any)', 'Esperiensia::editesperiensia/$1/$2');
$routes->get('{locale}/yuebhsjwiyabkepklwm34u72nh9932hk897362jlsnu3/image/esperiensia/(:any)', 'Esperiensia::image/$1');
$routes->post('{locale}/yuebhsjwiyabkepklwm34u72nh9932hk897362jlsnu3/processoimage/esperiensia/(:any)', 'Esperiensia::processoimage/$1');
$routes->post('{locale}/yuebhsjwiyabkepklwm34u72nh9932hk897362jlsnu3/create/esperiensia', 'Esperiensia::create');
$routes->post('{locale}/yuebhsjwiyabkepklwm34u72nh9932hk897362jlsnu3/update/esperiensia/(:any)', 'Esperiensia::update/$1');
$routes->post('{locale}/yuebhsjwiyabkepklwm34u72nh9932hk897362jlsnu3/delete/esperiensia', 'Esperiensia::troka');
$routes->get('{locale}/yuebhsjwiyabkepklwm34u72nh9932hk897362jlsnu3/hamoshotutemporario/esperiensia', 'Esperiensia::temporario');
$routes->post('{locale}/yuebhsjwiyabkepklwm34u72nh9932hk897362jlsnu3/temporario/esperiensia', 'Esperiensia::temporario');
$routes->delete('{locale}/yuebhsjwiyabkepklwm34u72nh9932hk897362jlsnu3/permanente/esperiensia', 'Esperiensia::permanente');
$routes->get('{locale}/yuebhsjwiyabkepklwm34u72nh9932hk897362jlsnu3/show/esperiensia/(:any)/(:any)/', 'Esperiensia::detail/$1/$2');

// Materia
$routes->get('{locale}/jkd34kjghe6twyu8934rfsvbamke90tey90/materia/(:any)/(:any)', 'Materia::materia/$1/$2');
$routes->get('{locale}/jkd34kjghe6twyu8934rfsvbamke90tey90/hamos/materia/(:any)/(:any)', 'Materia::hamos/$1/$2');
$routes->get('{locale}/jkd34kjghe6twyu8934rfsvbamke90tey90/new/materia', 'Materia::new');
$routes->get('{locale}/jkd34kjghe6twyu8934rfsvbamke90tey90/edit/materia/(:any)/(:any)', 'Materia::editmateria/$1/$2');
$routes->post('{locale}/jkd34kjghe6twyu8934rfsvbamke90tey90/create/materia', 'Materia::create');
$routes->post('{locale}/jkd34kjghe6twyu8934rfsvbamke90tey90/update/materia/(:any)', 'Materia::update/$1');
$routes->post('{locale}/jkd34kjghe6twyu8934rfsvbamke90tey90/delete/materia', 'Materia::troka');
$routes->get('{locale}/jkd34kjghe6twyu8934rfsvbamke90tey90/hamoshotutemporario/materia', 'Materia::temporario');
$routes->post('{locale}/jkd34kjghe6twyu8934rfsvbamke90tey90/temporario/materia', 'Materia::temporario');
$routes->delete('{locale}/jkd34kjghe6twyu8934rfsvbamke90tey90/permanente/materia', 'Materia::permanente');

// Projeito Backend
$routes->get('{locale}/hsf3hklprnshednlc9037hn38hrbs9830rtgtyu89r60/projeitobackend/(:any)', 'Projeitobackend::projeitobackend/$1');
$routes->get('{locale}/hsf3hklprnshednlc9037hn38hrbs9830rtgtyu89r60/hamos/projeitobackend/(:any)/(:any)', 'Projeitobackend::hamos/$1/$2');

$routes->get('{locale}/hsf3hklprnshednlc9037hn38hrbs9830rtgtyu89r60/new/projeitobackend/(:any)/(:any)', 'Projeitobackend::aumenta/$1/$2');
$routes->get('{locale}/hsf3hklprnshednlc9037hn38hrbs9830rtgtyu89r60/edit/projeitobackend/(:any)/(:any)', 'Projeitobackend::editbackend/$1/$2');
$routes->get('{locale}/hsf3hklprnshednlc9037hn38hrbs9830rtgtyu89r60/detail/projeitobackend/(:any)/(:any)', 'Projeitobackend::showbackend/$1/$2');
$routes->get('{locale}/hsf3hklprnshednlc9037hn38hrbs9830rtgtyu89r60/detailprojeito/projeitobackend/(:any)/(:any)', 'Projeitobackend::detailprojeito/$1/$2');
$routes->post('{locale}/hsf3hklprnshednlc9037hn38hrbs9830rtgtyu89r60/create/projeitobackend', 'Projeitobackend::create');
$routes->post('{locale}/hsf3hklprnshednlc9037hn38hrbs9830rtgtyu89r60/update/projeitobackend/(:any)', 'Projeitobackend::update/$1');
$routes->post('{locale}/hsf3hklprnshednlc9037hn38hrbs9830rtgtyu89r60/delete/projeitobackend', 'Projeitobackend::troka');
$routes->get('{locale}/hsf3hklprnshednlc9037hn38hrbs9830rtgtyu89r60/hamoshotutemporario/projeitobackend', 'Projeitobackend::temporario');
$routes->post('{locale}/hsf3hklprnshednlc9037hn38hrbs9830rtgtyu89r60/temporario/projeitobackend', 'Projeitobackend::temporario');
$routes->delete('{locale}/hsf3hklprnshednlc9037hn38hrbs9830rtgtyu89r60/permanente/projeitobackend', 'Projeitobackend::permanente');


// Sistema
$routes->get('{locale}/8ens3YsbPmsma7TalHsOia/sistema', 'Sistema::index');
$routes->get('{locale}/8ens3YsbPmsma7TalHsOia/new/sistema', 'Sistema::new');
$routes->get('{locale}/8ens3YsbPmsma7TalHsOia/hamos/sistema', 'Sistema::hamos');
$routes->get('{locale}/8ens3YsbPmsma7TalHsOia/edit/sistema/(:any)', 'Sistema::editsistema/$1');
$routes->post('{locale}/8ens3YsbPmsma7TalHsOia/aumenta/sistema', 'Sistema::create');
$routes->post('{locale}/8ens3YsbPmsma7TalHsOia/update/sistema/(:any)', 'Sistema::update/$1');
$routes->post('{locale}/8ens3YsbPmsma7TalHsOia/delete/sistema', 'Sistema::troka');
$routes->get('{locale}/8ens3YsbPmsma7TalHsOia/hamoshotutemporario/sistema', 'Sistema::temporario');
$routes->post('{locale}/8ens3YsbPmsma7TalHsOia/temporario/sistema', 'Sistema::temporario');
$routes->delete('{locale}/8ens3YsbPmsma7TalHsOia/permanente/sistema', 'Sistema::permanente');

// Aktivo Sistema
$routes->get('{locale}/hajjue7huiruiy746gjbjr87390jdnjjy7y21ju8477hcmie8usnmk909874gsh/aktivosistema/aktivoprofessores', 'Aktivosistema::aktivoprofessores');
$routes->get('{locale}/hajjue7huiruiy746gjbjr87390jdnjjy7y21ju8477hcmie8usnmk909874gsh/aktivosistema/aktivofunsionario', 'Aktivosistema::aktivofunsionario');
$routes->get('{locale}/hajjue7huiruiy746gjbjr87390jdnjjy7y21ju8477hcmie8usnmk909874gsh/aktivosistema/aktivohotuprofessores', 'Aktivosistema::aktivohotuprofessores');
$routes->get('{locale}/hajjue7huiruiy746gjbjr87390jdnjjy7y21ju8477hcmie8usnmk909874gsh/aktivosistema/aktivohotufunsionario', 'Aktivosistema::aktivohotufunsionario');
$routes->post('{locale}/hajjue7huiruiy746gjbjr87390jdnjjy7y21ju8477hcmie8usnmk909874gsh/aumenta/aktivosistema', 'Aktivosistema::aktivo');

$routes->get('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/menuaktivo', 'Menuaktivo::index');
$routes->get('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/show/menuaktivo/(:any)', 'Menuaktivo::show/$1');
$routes->post('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/finansa/menuaktivo', 'Menuaktivo::finansa');
$routes->post('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/funsionario/menuaktivo', 'Menuaktivo::funsionario');
$routes->post('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/professores/menuaktivo', 'Menuaktivo::professores');
$routes->post('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/estudante/menuaktivo', 'Menuaktivo::estudante');
$routes->post('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/projeitokursus/menuaktivo', 'Menuaktivo::projeitokursus');
$routes->post('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/classe/menuaktivo', 'Menuaktivo::classe');
$routes->post('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/categoriamateria/menuaktivo', 'Menuaktivo::categoriamateria');
$routes->post('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/certifikado/menuaktivo', 'Menuaktivo::certifikado');

$routes->get('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/aktivofinansa/menuaktivo/(:any)', 'Menuaktivo::aktivofinansa/$1');
$routes->get('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/aktivofunsionario/menuaktivo/(:any)', 'Menuaktivo::aktivofunsionario/$1');
$routes->get('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/aktivoprofessores/menuaktivo/(:any)', 'Menuaktivo::aktivoprofessores/$1');
$routes->get('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/aktivoestudante/menuaktivo/(:any)', 'Menuaktivo::aktivoestudante/$1');
$routes->get('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/aktivocategoriomateria/menuaktivo/(:any)', 'Menuaktivo::aktivocategoriomateria/$1');
$routes->get('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/aktivoprojeitokursus/menuaktivo/(:any)', 'Menuaktivo::aktivoprojeitokursus/$1');
$routes->get('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/aktivoclasse/menuaktivo/(:any)', 'Menuaktivo::aktivoclasse/$1');
$routes->get('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/aktivocertifikado/menuaktivo/(:any)', 'Menuaktivo::aktivocertifikado/$1');
$routes->post('{locale}/hayrt537gfgjgwtdfvcmnafxvzb783tycbdyuwglpowyqbadwgqy63gfbzaq23ghddi937owy2gd/sistemamenuaktivo/menuaktivo', 'Menuaktivo::sistemamenuaktivo');

$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/sidebaraktivo', 'Sidebaraktivo::index');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/show/sidebaraktivo/(:any)', 'sidebaraktivo::show/$1');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/balanceamout/sidebaraktivo', 'sidebaraktivo::balanceamout');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/donormoney/sidebaraktivo', 'sidebaraktivo::donormoney');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/employeesalary/sidebaraktivo', 'sidebaraktivo::employeesalary');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/teachersalary/sidebaraktivo', 'sidebaraktivo::teachersalary');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/receiveemployeesalary/sidebaraktivo', 'sidebaraktivo::receiveemployeesalary');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/receiveteachersalary/sidebaraktivo', 'sidebaraktivo::receiveteachersalary');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/moneysubsidy/sidebaraktivo', 'sidebaraktivo::moneysubsidy');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/employeemoneyloans/sidebaraktivo', 'sidebaraktivo::employeemoneyloans');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/teachermoneyloans/sidebaraktivo', 'sidebaraktivo::teachermoneyloans');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/employee/sidebaraktivo', 'sidebaraktivo::employee');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/teacher/sidebaraktivo', 'sidebaraktivo::teacher');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/teachersciense/sidebaraktivo', 'sidebaraktivo::teachersciense');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/students/sidebaraktivo', 'sidebaraktivo::students');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/sciensecategory/sidebaraktivo', 'sidebaraktivo::sciensecategory');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/sciense/sidebaraktivo', 'sidebaraktivo::sciense');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/courseproject/sidebaraktivo', 'sidebaraktivo::courseproject');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/room/sidebaraktivo', 'sidebaraktivo::room');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/courseschedule/sidebaraktivo', 'sidebaraktivo::courseschedule');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/allcourseschedule/sidebaraktivo', 'sidebaraktivo::allcourseschedule');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/value/sidebaraktivo', 'sidebaraktivo::value');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/absence/sidebaraktivo', 'sidebaraktivo::absence');

$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/totalsidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivototalsidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/donatorsidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivodonatorsidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/salariofunsionariosidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivosalariofunsionariosidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/salarioprofessoressidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivosalarioprofessoressidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/aktivosimusalariofunsionariosidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivosimusalariofunsionariosidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/aktivosimusalarioprofessoressidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivosimusalarioprofessoressidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/aktivomoneysubsidy/sidebaraktivo/(:any)', 'sidebaraktivo::aktivomoneysubsidy/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/imprestafunsionariosidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivoimprestafunsionariosidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/imprestaprofessoressidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivoimprestaprofessoressidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/funsionariosidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivofunsionariosidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/professoressidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivoprofessoressidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/materiaprofessoressidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivomateriaprofessoressidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/estudantesidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivoestudantesidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/materiakategoriosidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivomateriakategoriosidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/materiasidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivomateriasidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/kursusprojeitosidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivokursusprojeitosidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/classesidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivoclassesidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/horariosidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivohorariosidebar/$1');
$routes->post('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/sistemamenuaktivo/sidebaraktivo', 'sidebaraktivo::sistemamenuaktivo');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/valuesidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivovaluesidebar/$1');
$routes->get('{locale}/ndgeyai947yrggf673gfhvhfj46wgcpaqb1ydvhazbxvdfetqu47hrbfjsbbvry4893hfbjdbvjryf/absencesidebar/sidebaraktivo/(:any)', 'sidebaraktivo::aktivoabsencesidebar/$1');


$routes->get('{locale}/heut7etwg46fgyvchlhdywvggfhgegt36fhsvhfvchxvhgfhehfja8yfgvbancbxviey37fhjcbehc/inputupdatedelete', 'Inputupdatedelete::index');
$routes->get('{locale}/heut7etwg46fgyvchlhdywvggfhgegt36fhsvhfvchxvhgfhehfja8yfgvbancbxviey37fhjcbehc/show/inputupdatedelete/(:any)', 'Inputupdatedelete::show/$1');
$routes->get('{locale}/heut7etwg46fgyvchlhdywvggfhgegt36fhsvhfvchxvhgfhehfja8yfgvbancbxviey37fhjcbehc/aktivoinputan/inputupdatedelete/(:any)', 'Inputupdatedelete::aktivoinputan/$1');
$routes->get('{locale}/heut7etwg46fgyvchlhdywvggfhgegt36fhsvhfvchxvhgfhehfja8yfgvbancbxviey37fhjcbehc/aktivoupdate/inputupdatedelete/(:any)', 'Inputupdatedelete::aktivoupdate/$1');
$routes->get('{locale}/heut7etwg46fgyvchlhdywvggfhgegt36fhsvhfvchxvhgfhehfja8yfgvbancbxviey37fhjcbehc/aktivodelete/inputupdatedelete/(:any)', 'Inputupdatedelete::aktivodelete/$1');
$routes->post('{locale}/heut7etwg46fgyvchlhdywvggfhgegt36fhsvhfvchxvhgfhehfja8yfgvbancbxviey37fhjcbehc/input/inputupdatedelete', 'Inputupdatedelete::input');
$routes->post('{locale}/heut7etwg46fgyvchlhdywvggfhgegt36fhsvhfvchxvhgfhehfja8yfgvbancbxviey37fhjcbehc/update/inputupdatedelete', 'Inputupdatedelete::troka');
$routes->post('{locale}/heut7etwg46fgyvchlhdywvggfhgegt36fhsvhfvchxvhgfhehfja8yfgvbancbxviey37fhjcbehc/delete/inputupdatedelete', 'Inputupdatedelete::hamos');
$routes->post('{locale}/heut7etwg46fgyvchlhdywvggfhgegt36fhsvhfvchxvhgfhehfja8yfgvbancbxviey37fhjcbehc/sistemainputupdatedelete/inputupdatedelete', 'Inputupdatedelete::sistemainputupdatedelete');

// Room
$routes->get('{locale}/8ens3YsbPmsma7TalHsOiadjethahlvjdjgy3672bcjh352nkc0983/room', 'Room::index');
$routes->get('{locale}/8ens3YsbPmsma7TalHsOiadjethahlvjdjgy3672bcjh352nkc0983/new/room', 'Room::new');
$routes->get('{locale}/8ens3YsbPmsma7TalHsOiadjethahlvjdjgy3672bcjh352nkc0983/hamos/room', 'Room::hamos');
$routes->get('{locale}/8ens3YsbPmsma7TalHsOiadjethahlvjdjgy3672bcjh352nkc0983/edit/room/(:any)', 'Room::edit/$1');
$routes->post('{locale}/8ens3YsbPmsma7TalHsOiadjethahlvjdjgy3672bcjh352nkc0983/aumenta/room', 'Room::create');
$routes->post('{locale}/8ens3YsbPmsma7TalHsOiadjethahlvjdjgy3672bcjh352nkc0983/update/room/(:any)', 'Room::update/$1');
$routes->post('{locale}/8ens3YsbPmsma7TalHsOiadjethahlvjdjgy3672bcjh352nkc0983/delete/room', 'Room::troka');
$routes->get('{locale}/8ens3YsbPmsma7TalHsOiadjethahlvjdjgy3672bcjh352nkc0983/hamoshotutemporario/room', 'Room::temporario');
$routes->post('{locale}/8ens3YsbPmsma7TalHsOiadjethahlvjdjgy3672bcjh352nkc0983/temporario/room', 'Room::temporario');
$routes->delete('{locale}/8ens3YsbPmsma7TalHsOiadjethahlvjdjgy3672bcjh352nkc0983/permanente/room', 'Room::permanente');


// Saldo Organizasaun
$routes->get('{locale}/hetbjglpqiorpmplkmcn74862gjsre3570ufn386290poetbejahep094jhe/saldodonatorprivado', 'Saldodonatorprivado::index');
$routes->get('{locale}/hetbjglpqiorpmplkmcn74862gjsre3570ufn386290poetbejahep094jhe/new/saldodonatorprivado', 'Saldodonatorprivado::new');
$routes->get('{locale}/hetbjglpqiorpmplkmcn74862gjsre3570ufn386290poetbejahep094jhe/hamos/saldodonatorprivado', 'Saldodonatorprivado::hamos');
$routes->get('{locale}/hetbjglpqiorpmplkmcn74862gjsre3570ufn386290poetbejahep094jhe/edit/saldodonatorprivado/(:any)', 'Saldodonatorprivado::edit/$1');
$routes->post('{locale}/hetbjglpqiorpmplkmcn74862gjsre3570ufn386290poetbejahep094jhe/aumenta/saldodonatorprivado', 'Saldodonatorprivado::create');
$routes->post('{locale}/hetbjglpqiorpmplkmcn74862gjsre3570ufn386290poetbejahep094jhe/update/saldodonatorprivado/(:any)', 'Saldodonatorprivado::update/$1');
$routes->get('{locale}/hetbjglpqiorpmplkmcn74862gjsre3570ufn386290poetbejahep094jhe/image/saldodonatorprivado/(:any)', 'Saldodonatorprivado::image/$1');
$routes->post('{locale}/hetbjglpqiorpmplkmcn74862gjsre3570ufn386290poetbejahep094jhe/processoimage/saldodonatorprivado/(:any)', 'Saldodonatorprivado::processoimage/$1');
$routes->post('{locale}/hetbjglpqiorpmplkmcn74862gjsre3570ufn386290poetbejahep094jhe/delete/saldodonatorprivado', 'Saldodonatorprivado::troka');
$routes->get('{locale}/hetbjglpqiorpmplkmcn74862gjsre3570ufn386290poetbejahep094jhe/hamoshotutemporario/saldodonatorprivado', 'Saldodonatorprivado::temporario');
$routes->post('{locale}/hetbjglpqiorpmplkmcn74862gjsre3570ufn386290poetbejahep094jhe/temporario/saldodonatorprivado', 'Saldodonatorprivado::temporario');
$routes->delete('{locale}/hetbjglpqiorpmplkmcn74862gjsre3570ufn386290poetbejahep094jhe/permanente/saldodonatorprivado', 'Saldodonatorprivado::permanente');


// Saldo Tama
$routes->get('{locale}/jueoph357dhjlpw27gs093hbdnko380agqopr09uipejhbamlpbaqioncmkieu6579/osantamaprivado', 'Osantamaprivado::index');
$routes->get('{locale}/jueoph357dhjlpw27gs093hbdnko380agqopr09uipejhbamlpbaqioncmkieu6579/new/osantamaprivado/(:any)', 'Osantamaprivado::aumenta/$1');
$routes->get('{locale}/jueoph357dhjlpw27gs093hbdnko380agqopr09uipejhbamlpbaqioncmkieu6579/hamos/osantamaprivado/(:any)', 'Osantamaprivado::hamos/$1');
$routes->get('{locale}/jueoph357dhjlpw27gs093hbdnko380agqopr09uipejhbamlpbaqioncmkieu6579/edit/osantamaprivado/(:any)', 'Osantamaprivado::edit/$1');
$routes->post('{locale}/jueoph357dhjlpw27gs093hbdnko380agqopr09uipejhbamlpbaqioncmkieu6579/aumenta/osantamaprivado', 'Osantamaprivado::create');
$routes->post('{locale}/jueoph357dhjlpw27gs093hbdnko380agqopr09uipejhbamlpbaqioncmkieu6579/update/osantamaprivado/(:any)', 'Osantamaprivado::update/$1');
$routes->get('{locale}/jueoph357dhjlpw27gs093hbdnko380agqopr09uipejhbamlpbaqioncmkieu6579/show/osantamaprivado/(:any)', 'Osantamaprivado::show/$1');
$routes->post('{locale}/jueoph357dhjlpw27gs093hbdnko380agqopr09uipejhbamlpbaqioncmkieu6579/delete/osantamaprivado', 'Osantamaprivado::troka');
$routes->post('{locale}/jueoph357dhjlpw27gs093hbdnko380agqopr09uipejhbamlpbaqioncmkieu6579/temporario/osantamaprivado', 'Osantamaprivado::temporario');
$routes->delete('{locale}/jueoph357dhjlpw27gs093hbdnko380agqopr09uipejhbamlpbaqioncmkieu6579/permanente/osantamaprivado', 'Osantamaprivado::permanente');
$routes->get('{locale}/jueoph357dhjlpw27gs093hbdnko380agqopr09uipejhbamlpbaqioncmkieu6579/exportExcel/osantamaprivado/(:any)', 'Osantamaprivado::exportExcel/$1');
$routes->get('{locale}/jueoph357dhjlpw27gs093hbdnko380agqopr09uipejhbamlpbaqioncmkieu6579/exportPdf/osantamaprivado/(:any)', 'Osantamaprivado::exportPdf/$1');
$routes->post('{locale}/jueoph357dhjlpw27gs093hbdnko380agqopr09uipejhbamlpbaqioncmkieu6579/importExcel/osantamaprivado', 'Osantamaprivado::importExcel');


// Saldo Portfolio
$routes->get('{locale}/getb4hk47hkrjkangkgis89hhsnvbj467vb0948jndmmbagt47bsu47q9nfj/saldoportfolio', 'Saldoportfolio::index');
$routes->get('{locale}/getb4hk47hkrjkangkgis89hhsnvbj467vb0948jndmmbagt47bsu47q9nfj/new/saldoportfolio', 'Saldoportfolio::new');
$routes->get('{locale}/getb4hk47hkrjkangkgis89hhsnvbj467vb0948jndmmbagt47bsu47q9nfj/hamos/saldoportfolio', 'Saldoportfolio::hamos');
$routes->get('{locale}/getb4hk47hkrjkangkgis89hhsnvbj467vb0948jndmmbagt47bsu47q9nfj/edit/saldoportfolio/(:any)', 'Saldoportfolio::edit/$1');
$routes->post('{locale}/getb4hk47hkrjkangkgis89hhsnvbj467vb0948jndmmbagt47bsu47q9nfj/aumenta/saldoportfolio', 'Saldoportfolio::create');
$routes->post('{locale}/getb4hk47hkrjkangkgis89hhsnvbj467vb0948jndmmbagt47bsu47q9nfj/update/saldoportfolio/(:any)', 'Saldoportfolio::update/$1');
$routes->post('{locale}/getb4hk47hkrjkangkgis89hhsnvbj467vb0948jndmmbagt47bsu47q9nfj/delete/saldoportfolio', 'Saldoportfolio::troka');
$routes->get('{locale}/getb4hk47hkrjkangkgis89hhsnvbj467vb0948jndmmbagt47bsu47q9nfj/hamoshotutemporario/saldoportfolio', 'Saldoportfolio::temporario');
$routes->post('{locale}/getb4hk47hkrjkangkgis89hhsnvbj467vb0948jndmmbagt47bsu47q9nfj/temporario/saldoportfolio', 'Saldoportfolio::temporario');
$routes->delete('{locale}/getb4hk47hkrjkangkgis89hhsnvbj467vb0948jndmmbagt47bsu47q9nfj/permanente/saldoportfolio', 'Saldoportfolio::permanente');


// Categorio Projeito
$routes->get('{locale}/df34hye578hfjen4bjkslopeyhrnusnklnc67/categoriobackendfrontend/(:any)', 'Categoriobackendfrontend::categoriobackendfrontend/$1');
$routes->get('{locale}/df34hye578hfjen4bjkslopeyhrnusnklnc67/new/categoriobackendfrontend', 'Categoriobackendfrontend::new');
$routes->get('{locale}/df34hye578hfjen4bjkslopeyhrnusnklnc67/hamos/categoriobackendfrontend/(:any)', 'Categoriobackendfrontend::hamos/$1');
$routes->get('{locale}/df34hye578hfjen4bjkslopeyhrnusnklnc67/edit/categoriobackendfrontend/(:any)', 'Categoriobackendfrontend::edit/$1');
$routes->post('{locale}/df34hye578hfjen4bjkslopeyhrnusnklnc67/create/categoriobackendfrontend', 'Categoriobackendfrontend::create');
$routes->post('{locale}/df34hye578hfjen4bjkslopeyhrnusnklnc67/update/categoriobackendfrontend/(:any)', 'Categoriobackendfrontend::update/$1');
$routes->post('{locale}/df34hye578hfjen4bjkslopeyhrnusnklnc67/delete/categoriobackendfrontend', 'Categoriobackendfrontend::troka');
$routes->get('{locale}/df34hye578hfjen4bjkslopeyhrnusnklnc67/hamoshotutemporario/categoriobackendfrontend', 'Categoriobackendfrontend::temporario');
$routes->post('{locale}/df34hye578hfjen4bjkslopeyhrnusnklnc67/temporario/categoriobackendfrontend', 'Categoriobackendfrontend::temporario');
$routes->delete('{locale}/df34hye578hfjen4bjkslopeyhrnusnklnc67/permanente/categoriobackendfrontend', 'Categoriobackendfrontend::permanente');

// Profile Funsionario
$routes->get('{locale}/gsje7940ujf849w927940fh56uiebjcgusuygdywqrhvs736gc73tgc7375qgdvcg35q8gdbcbja73gsbcv/profilefunsionario', 'Profilefunsionario::index');

// Total Saldo Funsionario
$routes->get('{locale}/hatw564027hg73740openv672hgp0268udbjcbjuri690sbavxgzmjrutft7ewi8rwfgvudtdtyyfsodj42/totalsaldofunsionario', 'Totalsaldofunsionario::index');

// Saldo Donator Funsionario
$routes->get('{locale}/iei8847fu7674gfbckdolpdjjdev4563782egdvy4sre35ts63hvhdsctey464gfvhedetrfetyryfw7457/saldodonatorfunsionario', 'Saldodonatorfunsionario::index');
$routes->get('{locale}/iei8847fu7674gfbckdolpdjjdev4563782egdvy4sre35ts63hvhdsctey464gfvhedetrfetyryfw7457/show/saldodonatorfunsionario/(:any)', 'Saldodonatorfunsionario::detail/$1');
$routes->get('{locale}/iei8847fu7674gfbckdolpdjjdev4563782egdvy4sre35ts63hvhdsctey464gfvhedetrfetyryfw7457/new/saldodonatorfunsionario/(:any)', 'Saldodonatorfunsionario::aumenta/$1');
$routes->get('{locale}/iei8847fu7674gfbckdolpdjjdev4563782egdvy4sre35ts63hvhdsctey464gfvhedetrfetyryfw7457/edit/saldodonatorfunsionario/(:any)', 'Saldodonatorfunsionario::edit/$1');
$routes->post('{locale}/iei8847fu7674gfbckdolpdjjdev4563782egdvy4sre35ts63hvhdsctey464gfvhedetrfetyryfw7457/aumenta/saldodonatorfunsionario', 'Saldodonatorfunsionario::create');
$routes->post('{locale}/iei8847fu7674gfbckdolpdjjdev4563782egdvy4sre35ts63hvhdsctey464gfvhedetrfetyryfw7457/update/saldodonatorfunsionario/(:any)', 'Saldodonatorfunsionario::update/$1');
$routes->post('{locale}/iei8847fu7674gfbckdolpdjjdev4563782egdvy4sre35ts63hvhdsctey464gfvhedetrfetyryfw7457/delete/saldodonatorfunsionario', 'Saldodonatorfunsionario::troka');

// Data Employee
$routes->get('{locale}/yrubvsuubaojfnoprnvkdhur7859fhnvkfhruipiflkfd756rbvjjdkbvbvjirunvpiruv8494hnvdjr08rjv/employee', 'Employee::index');
$routes->get('{locale}/yrubvsuubaojfnoprnvkdhur7859fhnvkfhruipiflkfd756rbvjjdkbvbvjirunvpiruv8494hnvdjr08rjv/show/employee/(:any)', 'Employee::detail/$1');
$routes->get('{locale}/yrubvsuubaojfnoprnvkdhur7859fhnvkfhruipiflkfd756rbvjjdkbvbvjirunvpiruv8494hnvdjr08rjv/new/employee', 'Employee::new');
$routes->get('{locale}/yrubvsuubaojfnoprnvkdhur7859fhnvkfhruipiflkfd756rbvjjdkbvbvjirunvpiruv8494hnvdjr08rjv/edit/employee/(:any)', 'Employee::edit/$1');
$routes->post('{locale}/yrubvsuubaojfnoprnvkdhur7859fhnvkfhruipiflkfd756rbvjjdkbvbvjirunvpiruv8494hnvdjr08rjv/aumenta/employee', 'Employee::create');
$routes->post('{locale}/yrubvsuubaojfnoprnvkdhur7859fhnvkfhruipiflkfd756rbvjjdkbvbvjirunvpiruv8494hnvdjr08rjv/update/employee/(:any)', 'Employee::update/$1');
$routes->post('{locale}/yrubvsuubaojfnoprnvkdhur7859fhnvkfhruipiflkfd756rbvjjdkbvbvjirunvpiruv8494hnvdjr08rjv/delete/employee', 'Employee::troka');

// Data Professores
$routes->get('{locale}/hstyegcj84t4ybc8hf095ngpldhwtufbnvnyruu46ey4892brgjdbgkjyugbr094hfbgjsab47fgbki589hry5/teacher', 'Teacher::index');
$routes->get('{locale}/hstyegcj84t4ybc8hf095ngpldhwtufbnvnyruu46ey4892brgjdbgkjyugbr094hfbgjsab47fgbki589hry5/show/teacher/(:any)', 'Teacher::detail/$1');
$routes->get('{locale}/hstyegcj84t4ybc8hf095ngpldhwtufbnvnyruu46ey4892brgjdbgkjyugbr094hfbgjsab47fgbki589hry5/new/teacher', 'Teacher::new');
$routes->get('{locale}/hstyegcj84t4ybc8hf095ngpldhwtufbnvnyruu46ey4892brgjdbgkjyugbr094hfbgjsab47fgbki589hry5/edit/teacher/(:any)', 'Teacher::edit/$1');
$routes->post('{locale}/hstyegcj84t4ybc8hf095ngpldhwtufbnvnyruu46ey4892brgjdbgkjyugbr094hfbgjsab47fgbki589hry5/aumenta/teacher', 'Teacher::create');
$routes->post('{locale}/hstyegcj84t4ybc8hf095ngpldhwtufbnvnyruu46ey4892brgjdbgkjyugbr094hfbgjsab47fgbki589hry5/update/teacher/(:any)', 'Teacher::update/$1');
$routes->post('{locale}/hstyegcj84t4ybc8hf095ngpldhwtufbnvnyruu46ey4892brgjdbgkjyugbr094hfbgjsab47fgbki589hry5/delete/teacher', 'Teacher::troka');

// Registo Estudante
$routes->get('{locale}/gdhy748fgbcvd536fhuvbvkblpf095hfbvhfuruvbiog48903ythfswbvlghi5ygjskghvkslnvnr78vmkdg45zvg/estudanteregisto', 'Estudanteregisto::index');
$routes->get('{locale}/gdhy748fgbcvd536fhuvbvkblpf095hfbvhfuruvbiog48903ythfswbvlghi5ygjskghvkslnvnr78vmkdg45zvg/show/estudanteregisto/(:any)', 'Estudanteregisto::detail/$1');
$routes->get('{locale}/gdhy748fgbcvd536fhuvbvkblpf095hfbvhfuruvbiog48903ythfswbvlghi5ygjskghvkslnvnr78vmkdg45zvg/new/estudanteregisto', 'Estudanteregisto::new');
$routes->get('{locale}/gdhy748fgbcvd536fhuvbvkblpf095hfbvhfuruvbiog48903ythfswbvlghi5ygjskghvkslnvnr78vmkdg45zvg/edit/estudanteregisto/(:any)', 'Estudanteregisto::edit/$1');
$routes->post('{locale}/gdhy748fgbcvd536fhuvbvkblpf095hfbvhfuruvbiog48903ythfswbvlghi5ygjskghvkslnvnr78vmkdg45zvg/aumenta/estudanteregisto', 'Estudanteregisto::create');
$routes->post('{locale}/gdhy748fgbcvd536fhuvbvkblpf095hfbvhfuruvbiog48903ythfswbvlghi5ygjskghvkslnvnr78vmkdg45zvg/update/estudanteregisto/(:any)', 'Estudanteregisto::update/$1');
$routes->post('{locale}/gdhy748fgbcvd536fhuvbvkblpf095hfbvhfuruvbiog48903ythfswbvlghi5ygjskghvkslnvnr78vmkdg45zvg/delete/estudanteregisto', 'Estudanteregisto::troka');


// Categorio Materia
$routes->get('{locale}/ghdyeugbcvry674gf78407thbhvslgslsqtryfgvcvxyueuryt740fg487fgvh484gfhsy746tfgskvsfyafvcyr895/sciensiecategoryfunsionario', 'Sciensiecategoryfunsionario::index');
$routes->get('{locale}/ghdyeugbcvry674gf78407thbhvslgslsqtryfgvcvxyueuryt740fg487fgvh484gfhsy746tfgskvsfyafvcyr895/show/sciensiecategoryfunsionario/(:any)', 'Sciensiecategoryfunsionario::detail/$1');
$routes->get('{locale}/ghdyeugbcvry674gf78407thbhvslgslsqtryfgvcvxyueuryt740fg487fgvh484gfhsy746tfgskvsfyafvcyr895/new/sciensiecategoryfunsionario', 'Sciensiecategoryfunsionario::new');
$routes->get('{locale}/ghdyeugbcvry674gf78407thbhvslgslsqtryfgvcvxyueuryt740fg487fgvh484gfhsy746tfgskvsfyafvcyr895/edit/sciensiecategoryfunsionario/(:any)', 'Sciensiecategoryfunsionario::edit/$1');
$routes->get('{locale}/ghdyeugbcvry674gf78407thbhvslgslsqtryfgvcvxyueuryt740fg487fgvh484gfhsy746tfgskvsfyafvcyr895/image/sciensiecategoryfunsionario/(:any)', 'Sciensiecategoryfunsionario::image/$1');
$routes->post('{locale}/ghdyeugbcvry674gf78407thbhvslgslsqtryfgvcvxyueuryt740fg487fgvh484gfhsy746tfgskvsfyafvcyr895/processoimage/sciensiecategoryfunsionario/(:any)', 'Sciensiecategoryfunsionario::processoimage/$1');
$routes->post('{locale}/ghdyeugbcvry674gf78407thbhvslgslsqtryfgvcvxyueuryt740fg487fgvh484gfhsy746tfgskvsfyafvcyr895/aumenta/sciensiecategoryfunsionario', 'Sciensiecategoryfunsionario::create');
$routes->post('{locale}/ghdyeugbcvry674gf78407thbhvslgslsqtryfgvcvxyueuryt740fg487fgvh484gfhsy746tfgskvsfyafvcyr895/update/sciensiecategoryfunsionario/(:any)', 'Sciensiecategoryfunsionario::update/$1');
$routes->post('{locale}/ghdyeugbcvry674gf78407thbhvslgslsqtryfgvcvxyueuryt740fg487fgvh484gfhsy746tfgskvsfyafvcyr895/delete/sciensiecategoryfunsionario', 'Sciensiecategoryfunsionario::troka');

// Materia Funsionario
$routes->get('{locale}/juryeghvbnmkhc7835fgvhjhcvcge67389fyvghlavcnmzhdye635628fghcliviygaffett524dfccbbv980bjk/sciensiefunsionario', 'Sciensiefunsionario::index');
$routes->get('{locale}/juryeghvbnmkhc7835fgvhjhcvcge67389fyvghlavcnmzhdye635628fghcliviygaffett524dfccbbv980bjk/show/sciensiefunsionario/(:any)/(:any)', 'Sciensiefunsionario::materia/$1/$2');
$routes->get('{locale}/juryeghvbnmkhc7835fgvhjhcvcge67389fyvghlavcnmzhdye635628fghcliviygaffett524dfccbbv980bjk/new/sciensiefunsionario/(:any)', 'Sciensiefunsionario::aumenta/$1');
$routes->get('{locale}/juryeghvbnmkhc7835fgvhjhcvcge67389fyvghlavcnmzhdye635628fghcliviygaffett524dfccbbv980bjk/edit/sciensiefunsionario/(:any)/(:any)/(:any)', 'Sciensiefunsionario::editmateria/$1/$2/$3');
$routes->get('{locale}/juryeghvbnmkhc7835fgvhjhcvcge67389fyvghlavcnmzhdye635628fghcliviygaffett524dfccbbv980bjk/sciensie/sciensiefunsionario/(:any)', 'Sciensiefunsionario::sciensie/$1');
$routes->post('{locale}/juryeghvbnmkhc7835fgvhjhcvcge67389fyvghlavcnmzhdye635628fghcliviygaffett524dfccbbv980bjk/aumenta/sciensiefunsionario', 'Sciensiefunsionario::create');
$routes->post('{locale}/juryeghvbnmkhc7835fgvhjhcvcge67389fyvghlavcnmzhdye635628fghcliviygaffett524dfccbbv980bjk/update/sciensiefunsionario/(:any)', 'Sciensiefunsionario::update/$1');
$routes->post('{locale}/juryeghvbnmkhc7835fgvhjhcvcge67389fyvghlavcnmzhdye635628fghcliviygaffett524dfccbbv980bjk/delete/sciensiefunsionario', 'Sciensiefunsionario::troka');

// Categorio Projeito Funsionario
$routes->get('{locale}/jdyebandmkkdlilywtwcc647fycvvh2367984y736fghcbjjvge7w749038yfhbvjknxhe6avhvnbheye69364gfn/projeitocategoriofunsionario/(:any)', 'Projeitocategoriofunsionario::categoriobackendfrontend/$1');
$routes->get('{locale}/jdyebandmkkdlilywtwcc647fycvvh2367984y736fghcbjjvge7w749038yfhbvjknxhe6avhvnbheye69364gfn/new/projeitocategoriofunsionario/(:any)/(:any)/(:any)', 'Projeitocategoriofunsionario::aumenta/$1/$2/$3');
$routes->get('{locale}/jdyebandmkkdlilywtwcc647fycvvh2367984y736fghcbjjvge7w749038yfhbvjknxhe6avhvnbheye69364gfn/edit/projeitocategoriofunsionario/(:any)/(:any)/(:any)', 'Projeitocategoriofunsionario::editprojeto/$1/$2/$3');
$routes->get('{locale}/jdyebandmkkdlilywtwcc647fycvvh2367984y736fghcbjjvge7w749038yfhbvjknxhe6avhvnbheye69364gfn/show/projeitocategoriofunsionario/(:any)/(:any)/', 'Projeitocategoriofunsionario::detail/$1/$2');
$routes->post('{locale}/jdyebandmkkdlilywtwcc647fycvvh2367984y736fghcbjjvge7w749038yfhbvjknxhe6avhvnbheye69364gfn/create/projeitocategoriofunsionario', 'Projeitocategoriofunsionario::create');
$routes->post('{locale}/jdyebandmkkdlilywtwcc647fycvvh2367984y736fghcbjjvge7w749038yfhbvjknxhe6avhvnbheye69364gfn/update/projeitocategoriofunsionario/(:any)', 'Projeitocategoriofunsionario::update/$1');
$routes->post('{locale}/jdyebandmkkdlilywtwcc647fycvvh2367984y736fghcbjjvge7w749038yfhbvjknxhe6avhvnbheye69364gfn/delete/projeitocategoriofunsionario', 'Projeitocategoriofunsionario::troka');

// Room Funsionario
$routes->get('{locale}/heyicbnmdbhulpiwf5648fyhbvjkbjvue7abklry947fgjbbvbjkfiury763gwufovbcngvsmvbie478893865385ue/roomfunsionario', 'Roomfunsionario::index');
$routes->get('{locale}/heyicbnmdbhulpiwf5648fyhbvjkbjvue7abklry947fgjbbvbjkfiury763gwufovbcngvsmvbie478893865385ue/new/roomfunsionario', 'Roomfunsionario::new');
$routes->get('{locale}/heyicbnmdbhulpiwf5648fyhbvjkbjvue7abklry947fgjbbvbjkfiury763gwufovbcngvsmvbie478893865385ue/edit/roomfunsionario/(:any)', 'Roomfunsionario::edit/$1');
$routes->post('{locale}/heyicbnmdbhulpiwf5648fyhbvjkbjvue7abklry947fgjbbvbjkfiury763gwufovbcngvsmvbie478893865385ue/aumenta/roomfunsionario', 'Roomfunsionario::create');
$routes->post('{locale}/heyicbnmdbhulpiwf5648fyhbvjkbjvue7abklry947fgjbbvbjkfiury763gwufovbcngvsmvbie478893865385ue/update/roomfunsionario/(:any)', 'Roomfunsionario::update/$1');
$routes->post('{locale}/heyicbnmdbhulpiwf5648fyhbvjkbjvue7abklry947fgjbbvbjkfiury763gwufovbcngvsmvbie478893865385ue/delete/roomfunsionario', 'Roomfunsionario::troka');

// Horario Portfolio
$routes->get('{locale}/gerw453rfdoieywgvchvhvgcvgetcvacgvdvbzcbnjb64773gdygcbhcccbhwy373gdhajcbcbcbbwabcnwfh3y638fg/horarioportfolio', 'Horarioportfolio::index');
$routes->get('{locale}/gerw453rfdoieywgvchvhvgcvgetcvacgvdvbzcbnjb64773gdygcbhcccbhwy373gdhajcbcbcbbwabcnwfh3y638fg/new/horarioportfolio/(:any)', 'Horarioportfolio::aumenta/$1');
$routes->get('{locale}/gerw453rfdoieywgvchvhvgcvgetcvacgvdvbzcbnjb64773gdygcbhcccbhwy373gdhajcbcbcbbwabcnwfh3y638fg/edit/horarioportfolio/(:any)/(:any)', 'Horarioportfolio::edithorario/$1/$2');
$routes->get('{locale}/gerw453rfdoieywgvchvhvgcvgetcvacgvdvbzcbnjb64773gdygcbhcccbhwy373gdhajcbcbcbbwabcnwfh3y638fg/show/horarioportfolio/(:any)', 'Horarioportfolio::show/$1');
$routes->post('{locale}/gerw453rfdoieywgvchvhvgcvgetcvacgvdvbzcbnjb64773gdygcbhcccbhwy373gdhajcbcbcbbwabcnwfh3y638fg/aumenta/horarioportfolio', 'Horarioportfolio::create');
$routes->get('{locale}/gerw453rfdoieywgvchvhvgcvgetcvacgvdvbzcbnjb64773gdygcbhcccbhwy373gdhajcbcbcbbwabcnwfh3y638fg/detail/horarioportfolio/(:any)/(:any)', 'Horarioportfolio::detailmateria/$1/$2');
$routes->post('{locale}/gerw453rfdoieywgvchvhvgcvgetcvacgvdvbzcbnjb64773gdygcbhcccbhwy373gdhajcbcbcbbwabcnwfh3y638fg/update/horarioportfolio/(:any)', 'Horarioportfolio::update/$1');
$routes->post('{locale}/gerw453rfdoieywgvchvhvgcvgetcvacgvdvbzcbnjb64773gdygcbhcccbhwy373gdhajcbcbcbbwabcnwfh3y638fg/delete/horarioportfolio', 'Horarioportfolio::troka');


$routes->get('{locale}/gerw453rfdoieywgvchvhvgcvgetcvacgvdvbzcbnjb64773gdygcbhcccbhwy373gdhajcbcbcbbwabcnwfh3y638fg/detailhorarioportfolio', 'Detailhorarioportfolio::index');
$routes->get('{locale}/gerw453rfdoieywgvchvhvgcvgetcvacgvdvbzcbnjb64773gdygcbhcccbhwy373gdhajcbcbcbbwabcnwfh3y638fg/pdfhorarioprofessores/detailhorarioportfolio', 'Detailhorarioportfolio::pdfhorarioprofessores');

// Horario Funsionario
$routes->get('{locale}/djryhcgkoshjeu73tfuiopjacvxnmmcb35reygcjehc6389fybvhblskfaczyw62llbegy677eufghvvttwuiovkgje/horariofunsionario', 'Horariofunsionario::index');
$routes->get('{locale}/djryhcgkoshjeu73tfuiopjacvxnmmcb35reygcjehc6389fybvhblskfaczyw62llbegy677eufghvvttwuiovkgje/new/horariofunsionario/(:any)', 'Horariofunsionario::aumenta/$1');
$routes->get('{locale}/djryhcgkoshjeu73tfuiopjacvxnmmcb35reygcjehc6389fybvhblskfaczyw62llbegy677eufghvvttwuiovkgje/edit/horariofunsionario/(:any)/(:any)', 'Horariofunsionario::edithorario/$1/$2');
$routes->get('{locale}/djryhcgkoshjeu73tfuiopjacvxnmmcb35reygcjehc6389fybvhblskfaczyw62llbegy677eufghvvttwuiovkgje/show/horariofunsionario/(:any)', 'Horariofunsionario::show/$1');
$routes->post('{locale}/djryhcgkoshjeu73tfuiopjacvxnmmcb35reygcjehc6389fybvhblskfaczyw62llbegy677eufghvvttwuiovkgje/aumenta/horariofunsionario', 'Horariofunsionario::create');
$routes->get('{locale}/djryhcgkoshjeu73tfuiopjacvxnmmcb35reygcjehc6389fybvhblskfaczyw62llbegy677eufghvvttwuiovkgje/detail/horariofunsionario/(:any)/(:any)', 'Horariofunsionario::detailmateria/$1/$2');
$routes->post('{locale}/djryhcgkoshjeu73tfuiopjacvxnmmcb35reygcjehc6389fybvhblskfaczyw62llbegy677eufghvvttwuiovkgje/update/horariofunsionario/(:any)', 'Horariofunsionario::update/$1');
$routes->post('{locale}/djryhcgkoshjeu73tfuiopjacvxnmmcb35reygcjehc6389fybvhblskfaczyw62llbegy677eufghvvttwuiovkgje/delete/horariofunsionario', 'Horariofunsionario::troka');


$routes->get('{locale}/djryhcgkoshjeu73tfuiopjacvxnmmcb35reygcjehc6389fybvhblskfaczyw62llbegy677eufghvvttwuiovkgje/detailhorariofunsionario', 'Detailhorariofunsionario::index');
$routes->get('{locale}/djryhcgkoshjeu73tfuiopjacvxnmmcb35reygcjehc6389fybvhblskfaczyw62llbegy677eufghvvttwuiovkgje/pdfhorarioprofessores/detailhorariofunsionario', 'Detailhorariofunsionario::pdfhorarioprofessores');


// Materia Professores Funsionario
$routes->get('{locale}/djryhcgkoshjeu73tfuiopnhet4874yrgfybgiudgcvhnll784gfywvchjheft6evchjnbxget6478fgvualpirhvbj/materiaprofessores', 'Materiaprofessores::professores');
$routes->get('{locale}/djryhcgkoshjeu73tfuiopnhet4874yrgfybgiudgcvhnll784gfywvchjheft6evchjnbxget6478fgvualpirhvbj/new/materiaprofessores/(:any)', 'Materiaprofessores::aumenta/$1');
$routes->get('{locale}/djryhcgkoshjeu73tfuiopnhet4874yrgfybgiudgcvhnll784gfywvchjheft6evchjnbxget6478fgvualpirhvbj/edit/materiaprofessores/(:any)/(:any)', 'Materiaprofessores::editmateria/$1/$2');
$routes->get('{locale}/djryhcgkoshjeu73tfuiopnhet4874yrgfybgiudgcvhnll784gfywvchjheft6evchjnbxget6478fgvualpirhvbj/preparasaun/materiaprofessores/(:any)/(:any)', 'Materiaprofessores::detailmateria/$1/$2');
$routes->get('{locale}/djryhcgkoshjeu73tfuiopnhet4874yrgfybgiudgcvhnll784gfywvchjheft6evchjnbxget6478fgvualpirhvbj/show/materiaprofessores/(:any)', 'Materiaprofessores::materia/$1');
$routes->post('{locale}/djryhcgkoshjeu73tfuiopnhet4874yrgfybgiudgcvhnll784gfywvchjheft6evchjnbxget6478fgvualpirhvbj/aumenta/materiaprofessores', 'Materiaprofessores::createmateria');
$routes->post('{locale}/djryhcgkoshjeu73tfuiopnhet4874yrgfybgiudgcvhnll784gfywvchjheft6evchjnbxget6478fgvualpirhvbj/update/materiaprofessores/(:any)', 'Materiaprofessores::update/$1');
$routes->post('{locale}/djryhcgkoshjeu73tfuiopnhet4874yrgfybgiudgcvhnll784gfywvchjheft6evchjnbxget6478fgvualpirhvbj/delete/materiaprofessores', 'Materiaprofessores::troka');

// Materia Professores Portfolio
$routes->get('{locale}/hhryuwchyegcvyywer6cvhjyuey278ag39hcbjku387dgjavmavxgaft356dfgat378dtgvabvdyuqo90uehdgayyt67/materiaprofessoresportfolio', 'Materiaprofessoresportfolio::index');
$routes->get('{locale}/hhryuwchyegcvyywer6cvhjyuey278ag39hcbjku387dgjavmavxgaft356dfgat378dtgvabvdyuqo90uehdgayyt67/new/materiaprofessoresportfolio/(:any)', 'Materiaprofessoresportfolio::aumenta/$1');
$routes->get('{locale}/hhryuwchyegcvyywer6cvhjyuey278ag39hcbjku387dgjavmavxgaft356dfgat378dtgvabvdyuqo90uehdgayyt67/edit/materiaprofessoresportfolio/(:any)/(:any)', 'Materiaprofessoresportfolio::editmateria/$1/$2');
$routes->get('{locale}/hhryuwchyegcvyywer6cvhjyuey278ag39hcbjku387dgjavmavxgaft356dfgat378dtgvabvdyuqo90uehdgayyt67/preparasaun/materiaprofessoresportfolio/(:any)/(:any)', 'Materiaprofessoresportfolio::detailmateria/$1/$2');
$routes->get('{locale}/hhryuwchyegcvyywer6cvhjyuey278ag39hcbjku387dgjavmavxgaft356dfgat378dtgvabvdyuqo90uehdgayyt67/detail/materiaprofessoresportfolio/(:any)', 'Materiaprofessoresportfolio::materia/$1');
$routes->get('{locale}/hhryuwchyegcvyywer6cvhjyuey278ag39hcbjku387dgjavmavxgaft356dfgat378dtgvabvdyuqo90uehdgayyt67/show/materiaprofessoresportfolio/(:any)', 'Materiaprofessoresportfolio::show/$1');
$routes->post('{locale}/hhryuwchyegcvyywer6cvhjyuey278ag39hcbjku387dgjavmavxgaft356dfgat378dtgvabvdyuqo90uehdgayyt67/aumenta/materiaprofessoresportfolio', 'Materiaprofessoresportfolio::createmateria');
$routes->post('{locale}/hhryuwchyegcvyywer6cvhjyuey278ag39hcbjku387dgjavmavxgaft356dfgat378dtgvabvdyuqo90uehdgayyt67/update/materiaprofessoresportfolio/(:any)', 'Materiaprofessoresportfolio::update/$1');
$routes->post('{locale}/hhryuwchyegcvyywer6cvhjyuey278ag39hcbjku387dgjavmavxgaft356dfgat378dtgvabvdyuqo90uehdgayyt67/delete/materiaprofessoresportfolio', 'Materiaprofessoresportfolio::troka');
$routes->post('{locale}/hhryuwchyegcvyywer6cvhjyuey278ag39hcbjku387dgjavmavxgaft356dfgat378dtgvabvdyuqo90uehdgayyt67/temporario/materiaprofessoresportfolio', 'Materiaprofessoresportfolio::temporario');
$routes->get('{locale}/hhryuwchyegcvyywer6cvhjyuey278ag39hcbjku387dgjavmavxgaft356dfgat378dtgvabvdyuqo90uehdgayyt67/hamoshotutemporario/materiaprofessoresportfolio', 'Materiaprofessoresportfolio::temporario');
$routes->delete('{locale}/hhryuwchyegcvyywer6cvhjyuey278ag39hcbjku387dgjavmavxgaft356dfgat378dtgvabvdyuqo90uehdgayyt67/permanente/materiaprofessoresportfolio', 'Materiaprofessoresportfolio::permanente');

// Preparasaun Materia Portfolio
$routes->get('{locale}/hateygcopwyetdfhbcvagfdrwydiohfghvchvwreyfphgbvcgywuuiphvbjafhckjuuyteyfyywophcbxbvafgjklouetfgv/new/preparasaunmateriaportfolio/(:any)', 'Preparasaunmateriaportfolio::aumenta/$1');
$routes->get('{locale}/hateygcopwyetdfhbcvagfdrwydiohfghvchvwreyfphgbvcgywuuiphvbjafhckjuuyteyfyywophcbxbvafgjklouetfgv/edit/preparasaunmateriaportfolio/(:any)/(:any)/(:any)', 'Preparasaunmateriaportfolio::editmateria/$1/$2/$3');
$routes->get('{locale}/hateygcopwyetdfhbcvagfdrwydiohfghvchvwreyfphgbvcgywuuiphvbjafhckjuuyteyfyywophcbxbvafgjklouetfgv/preparasaun/preparasaunmateriaportfolio/(:any)/(:any)', 'Preparasaunmateriaportfolio::detailmateria/$1/$2');
$routes->get('{locale}/hateygcopwyetdfhbcvagfdrwydiohfghvchvwreyfphgbvcgywuuiphvbjafhckjuuyteyfyywophcbxbvafgjklouetfgv/show/preparasaunmateriaportfolio/(:any)', 'Preparasaunmateriaportfolio::materia/$1');
$routes->post('{locale}/hateygcopwyetdfhbcvagfdrwydiohfghvchvwreyfphgbvcgywuuiphvbjafhckjuuyteyfyywophcbxbvafgjklouetfgv/aumenta/preparasaunmateriaportfolio', 'Preparasaunmateriaportfolio::create');
$routes->post('{locale}/hateygcopwyetdfhbcvagfdrwydiohfghvchvwreyfphgbvcgywuuiphvbjafhckjuuyteyfyywophcbxbvafgjklouetfgv/update/preparasaunmateriaportfolio/(:any)', 'Preparasaunmateriaportfolio::update/$1');
$routes->post('{locale}/hateygcopwyetdfhbcvagfdrwydiohfghvchvwreyfphgbvcgywuuiphvbjafhckjuuyteyfyywophcbxbvafgjklouetfgv/delete/preparasaunmateriaportfolio', 'Preparasaunmateriaportfolio::troka');

// Preparasaun Materia Funsionario
$routes->get('{locale}/hey647gfjlquioap037fgbvjkhv6732hhcvhvmnxvdgywuioqp47y4902yfbdklajfh489801hdncklg48903hfbvvnhj/new/preparasaunmateria/(:any)', 'Preparasaunmateria::aumenta/$1');
$routes->get('{locale}/hey647gfjlquioap037fgbvjkhv6732hhcvhvmnxvdgywuioqp47y4902yfbdklajfh489801hdncklg48903hfbvvnhj/edit/preparasaunmateria/(:any)/(:any)/(:any)', 'Preparasaunmateria::editmateria/$1/$2/$3');
$routes->get('{locale}/hey647gfjlquioap037fgbvjkhv6732hhcvhvmnxvdgywuioqp47y4902yfbdklajfh489801hdncklg48903hfbvvnhj/preparasaun/preparasaunmateria/(:any)/(:any)', 'Preparasaunmateria::detailmateria/$1/$2');
$routes->get('{locale}/hey647gfjlquioap037fgbvjkhv6732hhcvhvmnxvdgywuioqp47y4902yfbdklajfh489801hdncklg48903hfbvvnhj/show/preparasaunmateria/(:any)', 'Preparasaunmateria::materia/$1');
$routes->post('{locale}/hey647gfjlquioap037fgbvjkhv6732hhcvhvmnxvdgywuioqp47y4902yfbdklajfh489801hdncklg48903hfbvvnhj/aumenta/preparasaunmateria', 'Preparasaunmateria::create');
$routes->post('{locale}/hey647gfjlquioap037fgbvjkhv6732hhcvhvmnxvdgywuioqp47y4902yfbdklajfh489801hdncklg48903hfbvvnhj/update/preparasaunmateria/(:any)', 'Preparasaunmateria::update/$1');
$routes->post('{locale}/hey647gfjlquioap037fgbvjkhv6732hhcvhvmnxvdgywuioqp47y4902yfbdklajfh489801hdncklg48903hfbvvnhj/delete/preparasaunmateria', 'Preparasaunmateria::troka');

// Salario Funsionario
$routes->get('{locale}/heuyftvvlaywyfibvlw673cp267gcvjlqray08hfu63gfjvbveh7389fhwg663gvcpo1gvdvacgcyueu6gfp08yfgavt5w/salariofunsionario', 'Salariofunsionario::index');
$routes->get('{locale}/heuyftvvlaywyfibvlw673cp267gcvjlqray08hfu63gfjvbveh7389fhwg663gvcpo1gvdvacgcyueu6gfp08yfgavt5w/new/salariofunsionario', 'Salariofunsionario::new');
$routes->get('{locale}/heuyftvvlaywyfibvlw673cp267gcvjlqray08hfu63gfjvbveh7389fhwg663gvcpo1gvdvacgcyueu6gfp08yfgavt5w/edit/salariofunsionario/(:any)', 'Salariofunsionario::edit/$1');
$routes->post('{locale}/heuyftvvlaywyfibvlw673cp267gcvjlqray08hfu63gfjvbveh7389fhwg663gvcpo1gvdvacgcyueu6gfp08yfgavt5w/aumenta/salariofunsionario', 'Salariofunsionario::create');
$routes->post('{locale}/heuyftvvlaywyfibvlw673cp267gcvjlqray08hfu63gfjvbveh7389fhwg663gvcpo1gvdvacgcyueu6gfp08yfgavt5w/update/salariofunsionario/(:any)', 'Salariofunsionario::update/$1');
$routes->post('{locale}/heuyftvvlaywyfibvlw673cp267gcvjlqray08hfu63gfjvbveh7389fhwg663gvcpo1gvdvacgcyueu6gfp08yfgavt5w/delete/salariofunsionario', 'Salariofunsionario::troka');

// Simu Salario Funsionario
$routes->get('{locale}/heuyftvvlaywyfibvlw673cp267gcvjlqray08hfu63gfjvbveh7389fhwg663gvcpo1gvdvacgcyueu6gfp08yfgavt5w/salario/salariofunsionario/(:any)', 'Salariofunsionario::salario/$1');
$routes->get('{locale}/heuyftvvlaywyfibvlw673cp267gcvjlqray08hfu63gfjvbveh7389fhwg663gvcpo1gvdvacgcyueu6gfp08yfgavt5w/salario/aumenta/salariofunsionario/(:any)', 'Salariofunsionario::newsalario/$1');
$routes->post('{locale}/heuyftvvlaywyfibvlw673cp267gcvjlqray08hfu63gfjvbveh7389fhwg663gvcpo1gvdvacgcyueu6gfp08yfgavt5w/salario/create/salariofunsionario', 'Salariofunsionario::createsalario');
$routes->get('{locale}/heuyftvvlaywyfibvlw673cp267gcvjlqray08hfu63gfjvbveh7389fhwg663gvcpo1gvdvacgcyueu6gfp08yfgavt5w/salario/editsalario/salariofunsionario/(:any)/(:any)', 'Salariofunsionario::editsalario/$1/$2');
$routes->post('{locale}/heuyftvvlaywyfibvlw673cp267gcvjlqray08hfu63gfjvbveh7389fhwg663gvcpo1gvdvacgcyueu6gfp08yfgavt5w/salario/updatesalario/salariofunsionario/(:any)', 'Salariofunsionario::updatesalario/$1');
$routes->post('{locale}/heuyftvvlaywyfibvlw673cp267gcvjlqray08hfu63gfjvbveh7389fhwg663gvcpo1gvdvacgcyueu6gfp08yfgavt5w/salario/trokasalario/salariofunsionario', 'Salariofunsionario::trokasalario');


// Salario Funsionario
$routes->get('{locale}/tyeicbteakgcfaeqpjf78grvcg362gcvgbcvafdqwooph783gfbvzxapquyetrrvcbjr7883gbfhfv2563gfvllakhg6wfdv/salarioprofessores', 'Salarioprofessores::index');
$routes->get('{locale}/tyeicbteakgcfaeqpjf78grvcg362gcvgbcvafdqwooph783gfbvzxapquyetrrvcbjr7883gbfhfv2563gfvllakhg6wfdv/new/salarioprofessores', 'Salarioprofessores::new');
$routes->get('{locale}/tyeicbteakgcfaeqpjf78grvcg362gcvgbcvafdqwooph783gfbvzxapquyetrrvcbjr7883gbfhfv2563gfvllakhg6wfdv/edit/salarioprofessores/(:any)', 'Salarioprofessores::edit/$1');
$routes->post('{locale}/tyeicbteakgcfaeqpjf78grvcg362gcvgbcvafdqwooph783gfbvzxapquyetrrvcbjr7883gbfhfv2563gfvllakhg6wfdv/aumenta/salarioprofessores', 'Salarioprofessores::create');
$routes->post('{locale}/tyeicbteakgcfaeqpjf78grvcg362gcvgbcvafdqwooph783gfbvzxapquyetrrvcbjr7883gbfhfv2563gfvllakhg6wfdv/update/salarioprofessores/(:any)', 'Salarioprofessores::update/$1');
$routes->post('{locale}/tyeicbteakgcfaeqpjf78grvcg362gcvgbcvafdqwooph783gfbvzxapquyetrrvcbjr7883gbfhfv2563gfvllakhg6wfdv/delete/salarioprofessores', 'Salarioprofessores::troka');

// simu salario Professores
$routes->get('{locale}/tyeicbteakgcfaeqpjf78grvcg362gcvgbcvafdqwooph783gfbvzxapquyetrrvcbjr7883gbfhfv2563gfvllakhg6wfdv/salario/salarioprofessores/(:any)', 'Salarioprofessores::salario/$1');
$routes->get('{locale}/tyeicbteakgcfaeqpjf78grvcg362gcvgbcvafdqwooph783gfbvzxapquyetrrvcbjr7883gbfhfv2563gfvllakhg6wfdv/aumentasalario/salarioprofessores/(:any)', 'Salarioprofessores::newsalario/$1');
$routes->post('{locale}/tyeicbteakgcfaeqpjf78grvcg362gcvgbcvafdqwooph783gfbvzxapquyetrrvcbjr7883gbfhfv2563gfvllakhg6wfdv/createsalario/salarioprofessores', 'Salarioprofessores::createsalario');
$routes->get('{locale}/tyeicbteakgcfaeqpjf78grvcg362gcvgbcvafdqwooph783gfbvzxapquyetrrvcbjr7883gbfhfv2563gfvllakhg6wfdv/editsalario/salarioprofessores/(:any)/(:any)', 'Salarioprofessores::editsalario/$1/$2');
$routes->post('{locale}/tyeicbteakgcfaeqpjf78grvcg362gcvgbcvafdqwooph783gfbvzxapquyetrrvcbjr7883gbfhfv2563gfvllakhg6wfdv/updatesalario/salarioprofessores/(:any)', 'Salarioprofessores::updatesalario/$1');
$routes->post('{locale}/tyeicbteakgcfaeqpjf78grvcg362gcvgbcvafdqwooph783gfbvzxapquyetrrvcbjr7883gbfhfv2563gfvllakhg6wfdv/trokasalario/salarioprofessores', 'Salarioprofessores::trokasalario');

//Impresta Salario Funsionario
$routes->get('{locale}/jekhcywtqppqabxaxwyuflkriyvb74629yfygb47gfh6389t9bddh8wgcbjzvcydv256duicbwjg267dganckhg45gwjuidyw6/imprestaosanfunsionario', 'Imprestaosanfunsionario::index');
$routes->get('{locale}/jekhcywtqppqabxaxwyuflkriyvb74629yfygb47gfh6389t9bddh8wgcbjzvcydv256duicbwjg267dganckhg45gwjuidyw6/new/imprestaosanfunsionario', 'Imprestaosanfunsionario::new');
$routes->get('{locale}/jekhcywtqppqabxaxwyuflkriyvb74629yfygb47gfh6389t9bddh8wgcbjzvcydv256duicbwjg267dganckhg45gwjuidyw6/edit/imprestaosanfunsionario/(:any)', 'Imprestaosanfunsionario::edit/$1');
$routes->post('{locale}/jekhcywtqppqabxaxwyuflkriyvb74629yfygb47gfh6389t9bddh8wgcbjzvcydv256duicbwjg267dganckhg45gwjuidyw6/aumenta/imprestaosanfunsionario', 'Imprestaosanfunsionario::create');
$routes->post('{locale}/jekhcywtqppqabxaxwyuflkriyvb74629yfygb47gfh6389t9bddh8wgcbjzvcydv256duicbwjg267dganckhg45gwjuidyw6/update/imprestaosanfunsionario/(:any)', 'Imprestaosanfunsionario::update/$1');
$routes->post('{locale}/jekhcywtqppqabxaxwyuflkriyvb74629yfygb47gfh6389t9bddh8wgcbjzvcydv256duicbwjg267dganckhg45gwjuidyw6/delete/imprestaosanfunsionario', 'Imprestaosanfunsionario::troka');

//Impresta Salario Funsionario Portfolio
$routes->get('{locale}/sdwryoiiyfygvjbcbjg5849rhfbbvxxz245tfdpiyvcbcgkgfey4t6fhvcaxzvhruuyy7grvgfgftfwi94ygfveyw62cg256fyli/imprestaosanfunsionarioportfolio', 'Imprestaosanfunsionarioportfolio::index');
$routes->get('{locale}/sdwryoiiyfygvjbcbjg5849rhfbbvxxz245tfdpiyvcbcgkgfey4t6fhvcaxzvhruuyy7grvgfgftfwi94ygfveyw62cg256fyli/new/imprestaosanfunsionarioportfolio/(:any)', 'Imprestaosanfunsionarioportfolio::aumenta/$1');
$routes->get('{locale}/sdwryoiiyfygvjbcbjg5849rhfbbvxxz245tfdpiyvcbcgkgfey4t6fhvcaxzvhruuyy7grvgfgftfwi94ygfveyw62cg256fyli/show/imprestaosanfunsionarioportfolio/(:any)', 'Imprestaosanfunsionarioportfolio::show/$1');
$routes->get('{locale}/sdwryoiiyfygvjbcbjg5849rhfbbvxxz245tfdpiyvcbcgkgfey4t6fhvcaxzvhruuyy7grvgfgftfwi94ygfveyw62cg256fyli/hamos/imprestaosanfunsionarioportfolio/(:any)', 'Imprestaosanfunsionarioportfolio::hamos/$1');
$routes->get('{locale}/sdwryoiiyfygvjbcbjg5849rhfbbvxxz245tfdpiyvcbcgkgfey4t6fhvcaxzvhruuyy7grvgfgftfwi94ygfveyw62cg256fyli/edit/imprestaosanfunsionarioportfolio/(:any)/(:any)', 'Imprestaosanfunsionarioportfolio::editimpresta/$1/$2');
$routes->post('{locale}/sdwryoiiyfygvjbcbjg5849rhfbbvxxz245tfdpiyvcbcgkgfey4t6fhvcaxzvhruuyy7grvgfgftfwi94ygfveyw62cg256fyli/aumenta/imprestaosanfunsionarioportfolio', 'Imprestaosanfunsionarioportfolio::create');
$routes->post('{locale}/sdwryoiiyfygvjbcbjg5849rhfbbvxxz245tfdpiyvcbcgkgfey4t6fhvcaxzvhruuyy7grvgfgftfwi94ygfveyw62cg256fyli/update/imprestaosanfunsionarioportfolio/(:any)', 'Imprestaosanfunsionarioportfolio::update/$1');
$routes->post('{locale}/sdwryoiiyfygvjbcbjg5849rhfbbvxxz245tfdpiyvcbcgkgfey4t6fhvcaxzvhruuyy7grvgfgftfwi94ygfveyw62cg256fyli/delete/imprestaosanfunsionarioportfolio', 'Imprestaosanfunsionarioportfolio::troka');
$routes->post('{locale}/sdwryoiiyfygvjbcbjg5849rhfbbvxxz245tfdpiyvcbcgkgfey4t6fhvcaxzvhruuyy7grvgfgftfwi94ygfveyw62cg256fyli/temporario/imprestaosanfunsionarioportfolio', 'Imprestaosanfunsionarioportfolio::temporario');
$routes->delete('{locale}/sdwryoiiyfygvjbcbjg5849rhfbbvxxz245tfdpiyvcbcgkgfey4t6fhvcaxzvhruuyy7grvgfgftfwi94ygfveyw62cg256fyli/permanente/imprestaosanfunsionarioportfolio', 'Imprestaosanfunsionarioportfolio::permanente');

//Impresta Salario Professores Portfolio
$routes->get('{locale}/hwyquopdghdbhe5298fygtfgnzxcbmkleu839rygfcaftwufyvchzhjchey7wvfhjahjwiof0386rgsgsg362gquudgcb36dfayue6/imprestaosanprofessoresportfolio', 'Imprestaosanprofessoresportfolio::index');
$routes->get('{locale}/hwyquopdghdbhe5298fygtfgnzxcbmkleu839rygfcaftwufyvchzhjchey7wvfhjahjwiof0386rgsgsg362gquudgcb36dfayue6/new/imprestaosanprofessoresportfolio/(:any)', 'Imprestaosanprofessoresportfolio::aumenta/$1');
$routes->get('{locale}/hwyquopdghdbhe5298fygtfgnzxcbmkleu839rygfcaftwufyvchzhjchey7wvfhjahjwiof0386rgsgsg362gquudgcb36dfayue6/show/imprestaosanprofessoresportfolio/(:any)', 'Imprestaosanprofessoresportfolio::show/$1');
$routes->get('{locale}/hwyquopdghdbhe5298fygtfgnzxcbmkleu839rygfcaftwufyvchzhjchey7wvfhjahjwiof0386rgsgsg362gquudgcb36dfayue6/hamos/imprestaosanprofessoresportfolio/(:any)', 'Imprestaosanprofessoresportfolio::hamos/$1');
$routes->get('{locale}/hwyquopdghdbhe5298fygtfgnzxcbmkleu839rygfcaftwufyvchzhjchey7wvfhjahjwiof0386rgsgsg362gquudgcb36dfayue6/edit/imprestaosanprofessoresportfolio/(:any)/(:any)', 'Imprestaosanprofessoresportfolio::editimpresta/$1/$2');
$routes->post('{locale}/hwyquopdghdbhe5298fygtfgnzxcbmkleu839rygfcaftwufyvchzhjchey7wvfhjahjwiof0386rgsgsg362gquudgcb36dfayue6/aumenta/imprestaosanprofessoresportfolio', 'Imprestaosanprofessoresportfolio::create');
$routes->post('{locale}/hwyquopdghdbhe5298fygtfgnzxcbmkleu839rygfcaftwufyvchzhjchey7wvfhjahjwiof0386rgsgsg362gquudgcb36dfayue6/update/imprestaosanprofessoresportfolio/(:any)', 'Imprestaosanprofessoresportfolio::update/$1');
$routes->post('{locale}/hwyquopdghdbhe5298fygtfgnzxcbmkleu839rygfcaftwufyvchzhjchey7wvfhjahjwiof0386rgsgsg362gquudgcb36dfayue6/delete/imprestaosanprofessoresportfolio', 'Imprestaosanprofessoresportfolio::troka');
$routes->post('{locale}/hwyquopdghdbhe5298fygtfgnzxcbmkleu839rygfcaftwufyvchzhjchey7wvfhjahjwiof0386rgsgsg362gquudgcb36dfayue6/temporario/imprestaosanprofessoresportfolio', 'Imprestaosanprofessoresportfolio::temporario');
$routes->delete('{locale}/hwyquopdghdbhe5298fygtfgnzxcbmkleu839rygfcaftwufyvchzhjchey7wvfhjahjwiof0386rgsgsg362gquudgcb36dfayue6/permanente/imprestaosanprofessoresportfolio', 'Imprestaosanprofessoresportfolio::permanente');

//Impresta Salario Professores
$routes->get('{locale}/wetucblladfghytjwonvbhe937gry648fhgmzmzmzyete782trgvhvhjyy36728fgyuyklagygydyafyfay676372hu3gcvywt3/imprestaosanprofessores', 'Imprestaosanprofessores::index');
$routes->get('{locale}/wetucblladfghytjwonvbhe937gry648fhgmzmzmzyete782trgvhvhjyy36728fgyuyklagygydyafyfay676372hu3gcvywt3/new/imprestaosanprofessores', 'Imprestaosanprofessores::new');
$routes->get('{locale}/wetucblladfghytjwonvbhe937gry648fhgmzmzmzyete782trgvhvhjyy36728fgyuyklagygydyafyfay676372hu3gcvywt3/edit/imprestaosanprofessores/(:any)', 'Imprestaosanprofessores::edit/$1');
$routes->post('{locale}/wetucblladfghytjwonvbhe937gry648fhgmzmzmzyete782trgvhvhjyy36728fgyuyklagygydyafyfay676372hu3gcvywt3/aumenta/imprestaosanprofessores', 'Imprestaosanprofessores::create');
$routes->post('{locale}/wetucblladfghytjwonvbhe937gry648fhgmzmzmzyete782trgvhvhjyy36728fgyuyklagygydyafyfay676372hu3gcvywt3/update/imprestaosanprofessores/(:any)', 'Imprestaosanprofessores::update/$1');
$routes->post('{locale}/wetucblladfghytjwonvbhe937gry648fhgmzmzmzyete782trgvhvhjyy36728fgyuyklagygydyafyfay676372hu3gcvywt3/delete/imprestaosanprofessores', 'Imprestaosanprofessores::troka');

//Salario Funsionario Portfolio
$routes->get('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/salariofunsionarioportfolio', 'Salariofunsionarioportfolio::index');
$routes->get('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/new/salariofunsionarioportfolio', 'Salariofunsionarioportfolio::new');
$routes->get('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/hamos/salariofunsionarioportfolio', 'Salariofunsionarioportfolio::hamos');
$routes->get('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/edit/salariofunsionarioportfolio/(:any)', 'Salariofunsionarioportfolio::edit/$1');
$routes->post('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/aumenta/salariofunsionarioportfolio', 'Salariofunsionarioportfolio::create');
$routes->post('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/update/salariofunsionarioportfolio/(:any)', 'Salariofunsionarioportfolio::update/$1');
$routes->post('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/delete/salariofunsionarioportfolio', 'Salariofunsionarioportfolio::troka');
$routes->get('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/hamoshotutemporario/salariofunsionarioportfolio', 'Salariofunsionarioportfolio::temporario');
$routes->post('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/temporario/salariofunsionarioportfolio', 'Salariofunsionarioportfolio::temporario');
$routes->delete('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/permanente/salariofunsionarioportfolio', 'Salariofunsionarioportfolio::permanente');

// Simu Salario Funsionario
$routes->get('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/salario/salariofunsionarioportfolio/(:any)', 'Salariofunsionarioportfolio::salario/$1');
$routes->get('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/salario/aumenta/salariofunsionarioportfolio/(:any)', 'Salariofunsionarioportfolio::newsalario/$1');
$routes->post('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/salario/update/salariofunsionarioportfolio/(:any)', 'Salariofunsionarioportfolio::updatesalario/$1');
$routes->get('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/salario/edit/salariofunsionarioportfolio/(:any)/(:any)', 'Salariofunsionarioportfolio::editsalario/$1/$2');
$routes->post('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/salariocreate/salariofunsionarioportfolio', 'Salariofunsionarioportfolio::createsalario');
$routes->post('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/salariotroka/salariofunsionarioportfolio', 'Salariofunsionarioportfolio::trokasalario');
$routes->get('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/salariohamos/salariofunsionarioportfolio/(:any)', 'Salariofunsionarioportfolio::hamossalario/$1');
$routes->post('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/restoresalario/salariofunsionarioportfolio', 'Salariofunsionarioportfolio::temporariosalario');
$routes->post('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/restorehotusalario/salariofunsionarioportfolio', 'Salariofunsionarioportfolio::temporariosalariohotu');
$routes->delete('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/deletesalario/salariofunsionarioportfolio', 'Salariofunsionarioportfolio::hamospermanente');
$routes->delete('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/deletehotusalario/salariofunsionarioportfolio', 'Salariofunsionarioportfolio::hamoshotupermanente');

// Simu Salario professores
$routes->get('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/salarioprofessores/salarioprofessoresportfolio/(:any)', 'Salarioprofessoresportfolio::salario/$1');
$routes->get('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/salarioprofessores/aumenta/salarioprofessoresportfolio/(:any)', 'Salarioprofessoresportfolio::newsalario/$1');
$routes->post('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/salarioprofessores/update/salarioprofessoresportfolio/(:any)', 'Salarioprofessoresportfolio::updatesalario/$1');
$routes->get('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/salarioprofessores/edit/salarioprofessoresportfolio/(:any)/(:any)', 'Salarioprofessoresportfolio::editsalario/$1/$2');
$routes->post('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/salariocreateprofessores/salarioprofessoresportfolio', 'Salarioprofessoresportfolio::createsalario');
$routes->post('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/salariotrokaprofessores/salarioprofessoresportfolio', 'Salarioprofessoresportfolio::trokasalario');
$routes->get('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/salariohamosprofessores/salarioprofessoresportfolio/(:any)', 'Salarioprofessoresportfolio::hamossalario/$1');
$routes->post('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/restoresalarioprofessores/salarioprofessoresportfolio', 'Salarioprofessoresportfolio::temporariosalario');
$routes->post('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/restorehotusalarioprofessores/salarioprofessoresportfolio', 'Salarioprofessoresportfolio::temporariosalariohotu');
$routes->delete('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/deletesalarioprofessores/salarioprofessoresportfolio', 'Salarioprofessoresportfolio::hamospermanente');
$routes->delete('{locale}/geetyeoppoyrtw67390563tdgvacxmzjklowp93erfdcgaeqwgfvcxznvbfheupu8353fvgssjvi902recghuud7e89eyrgbxgaw2/deletehotusalarioprofessores/salarioprofessoresportfolio', 'Salarioprofessoresportfolio::hamoshotupermanente');

//Salario Professores Portfolio
$routes->get('{locale}/bfrwqopnbzxadqwyuid89396fgbvjknxmbzcxbhdjriopy6748936895hbbdgcijsyrbfhjehf874hhbdjadqwpjfmnvjiue7fubjjbt2/salarioprofessoresportfolio', 'Salarioprofessoresportfolio::index');
$routes->get('{locale}/bfrwqopnbzxadqwyuid89396fgbvjknxmbzcxbhdjriopy6748936895hbbdgcijsyrbfhjehf874hhbdjadqwpjfmnvjiue7fubjjbt2/new/salarioprofessoresportfolio', 'Salarioprofessoresportfolio::new');
$routes->get('{locale}/bfrwqopnbzxadqwyuid89396fgbvjknxmbzcxbhdjriopy6748936895hbbdgcijsyrbfhjehf874hhbdjadqwpjfmnvjiue7fubjjbt2/hamos/salarioprofessoresportfolio', 'Salarioprofessoresportfolio::hamos');
$routes->get('{locale}/bfrwqopnbzxadqwyuid89396fgbvjknxmbzcxbhdjriopy6748936895hbbdgcijsyrbfhjehf874hhbdjadqwpjfmnvjiue7fubjjbt2/edit/salarioprofessoresportfolio/(:any)', 'Salarioprofessoresportfolio::edit/$1');
$routes->post('{locale}/bfrwqopnbzxadqwyuid89396fgbvjknxmbzcxbhdjriopy6748936895hbbdgcijsyrbfhjehf874hhbdjadqwpjfmnvjiue7fubjjbt2/aumenta/salarioprofessoresportfolio', 'Salarioprofessoresportfolio::create');
$routes->post('{locale}/bfrwqopnbzxadqwyuid89396fgbvjknxmbzcxbhdjriopy6748936895hbbdgcijsyrbfhjehf874hhbdjadqwpjfmnvjiue7fubjjbt2/update/salarioprofessoresportfolio/(:any)', 'Salarioprofessoresportfolio::update/$1');
$routes->post('{locale}/bfrwqopnbzxadqwyuid89396fgbvjknxmbzcxbhdjriopy6748936895hbbdgcijsyrbfhjehf874hhbdjadqwpjfmnvjiue7fubjjbt2/delete/salarioprofessoresportfolio', 'Salarioprofessoresportfolio::troka');
$routes->get('{locale}/bfrwqopnbzxadqwyuid89396fgbvjknxmbzcxbhdjriopy6748936895hbbdgcijsyrbfhjehf874hhbdjadqwpjfmnvjiue7fubjjbt2/hamoshotutemporario/salarioprofessoresportfolio', 'Salarioprofessoresportfolio::temporario');
$routes->post('{locale}/bfrwqopnbzxadqwyuid89396fgbvjknxmbzcxbhdjriopy6748936895hbbdgcijsyrbfhjehf874hhbdjadqwpjfmnvjiue7fubjjbt2/temporario/salarioprofessoresportfolio', 'Salarioprofessoresportfolio::temporario');
$routes->delete('{locale}/bfrwqopnbzxadqwyuid89396fgbvjknxmbzcxbhdjriopy6748936895hbbdgcijsyrbfhjehf874hhbdjadqwpjfmnvjiue7fubjjbt2/permanente/salarioprofessoresportfolio', 'Salarioprofessoresportfolio::permanente');

// Profile Estudante
$routes->get('{locale}/hryufbahdtrgfyfycvhdgtteyvchhfcteftcftdtaudloe64ywg4782ybfjjcklwir85683yrfhhsskcnkkkgnbbxxnvlpeuwhbnnmcchy/profileestudante', 'Profileestudante::index');
$routes->get('{locale}/hryufbahdtrgfyfycvhdgtteyvchhfcteftcftdtaudloe64ywg4782ybfjjcklwir85683yrfhhsskcnkkkgnbbxxnvlpeuwhbnnmcchy/perguntas/perguntasestudante', 'Perguntasestudante::perguntas');
$routes->get('{locale}/hryufbahdtrgfyfycvhdgtteyvchhfcteftcftdtaudloe64ywg4782ybfjjcklwir85683yrfhhsskcnkkkgnbbxxnvlpeuwhbnnmcchy/detailperguntas/perguntasestudante/(:any)', 'Perguntasestudante::detailperguntas/$1');

// Horario Estudante
$routes->get('{locale}/vdertyuiopljaqw23456trfghbnmvcxza2345rer34t67yui90oiuy5rfdfghjnmvcxaqw23ewty679op0oiu7uy6gfthg56tfdcvbnhy78/horarioestudante', 'Horarioestudante::index');
$routes->post('{locale}/vdertyuiopljaqw23456trfghbnmvcxza2345rer34t67yui90oiuy5rfdfghjnmvcxaqw23ewty679op0oiu7uy6gfthg56tfdcvbnhy78/aumenta/horarioestudante', 'Horarioestudante::create');

// Detail Materia Estudante
$routes->get('{locale}/heutgr6387dygq8egb28u02yhdbvadstw53902hdjlapwu36yagdvh3t63828eyhdsuabqbdwvruy37tfghwjdbbvvheyyyydywylfjjwgsvvwhdwydw/detailmateria/homeestudante/(:any)/(:any)/(:any)', 'Homeestudante::detailmateria/$1/$2/$3');

// Valores Professores
$routes->get('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/valoresfunsionario', 'Valoresfunsionario::index');
$routes->get('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/show/valoresfunsionario/(:any)', 'Valoresfunsionario::show/$1');
$routes->get('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/detail/valoresfunsionario/(:any)/(:any)/(:num)/(:any)/(:any)', 'Valoresfunsionario::detailvalores/$1/$2/$3/$4/$5');
$routes->get('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/trabalho/valoresfunsionario/(:any)/(:any)/(:num)/(:any)/(:any)', 'Valoresfunsionario::trabalho/$1/$2/$3/$4/$5');
$routes->post('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/processotrabalho/valoresfunsionario', 'Valoresfunsionario::processotrabalho');
$routes->get('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/temporariotrabalhohamoshotu/valoresfunsionario', 'Valoresfunsionario::temporariotrabalho');
$routes->get('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/texteexame/valoresfunsionario/(:any)/(:any)/(:num)/(:any)/(:any)', 'Valoresfunsionario::texteexame/$1/$2/$3/$4/$5');
$routes->post('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/processoexametexte/valoresfunsionario', 'Valoresfunsionario::processoexametexte');
$routes->post('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/valoresexametexte/valoresfunsionario', 'Valoresfunsionario::valoresexametexte');
$routes->post('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/inputvaloresexametexte/valoresfunsionario', 'Valoresfunsionario::inputvaloresexametexte');
$routes->get('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/temporarioexametextehamoshotu/valoresfunsionario', 'Valoresfunsionario::temporarioexametexte');
$routes->get('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/detailvaloresestudante/valoresfunsionario/(:any)/(:any)/(:num)/(:any)/(:any)', 'Valoresfunsionario::detailvaloresestudante/$1/$2/$3/$4/$5');

// Valores Estudante
$routes->get('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/valoresestudante', 'valoresestudante::index');
$routes->get('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/detailvaloresestudante/valoresestudante/(:any)/(:any)/(:num)/(:any)/(:any)', 'valoresestudante::detailvaloresestudante/$1/$2/$3/$4/$5');
$routes->get('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/pdfvaloresestudante/valoresestudante/(:any)', 'valoresestudante::pdfvaloresestudante/$1');

// Absensi Estudante
$routes->get('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/detailabsensi/valoresestudante/(:any)/(:any)/(:num)/(:any)/(:any)/(:any)', 'Valoresestudante::detailabsensi/$1/$2/$3/$4/$5/$6');

// Absensi Estudante professores
$routes->get('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/absensi/valoresfunsionario/(:any)/(:any)/(:num)/(:any)/(:any)', 'Valoresfunsionario::detailabsensi/$1/$2/$3/$4/$5');
$routes->get('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/detailabsensifunsionario/valoresfunsionario/(:any)/(:any)/(:num)/(:any)/(:any)', 'Valoresfunsionario::detailabsensifunsionario/$1/$2/$3/$4/$5');
$routes->post('{locale}/huwr34dgygtdgcbnamo9035dgbcjgcnba324dhfjkalpie6tdfavcnxuw6dtgvw93hdjshcbbfhehiencneyarwwe4hyeytdopqwerb67225/aumentaabsensi/valoresfunsionario', 'Valoresfunsionario::aumentaabsensi');


// Selu Kursus Estudante Portfolio
$routes->get('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/totalsaldoestudante', 'Totalsaldoestudante::index');
$routes->get('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/aumenta/totalsaldoestudante', 'Totalsaldoestudante::aumentatotalsaldoestudante');
$routes->get('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/troka/totalsaldoestudante/(:any)', 'Totalsaldoestudante::trokatotalsaldoestudante/$1');
$routes->post('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/trokarai/totalsaldoestudante/(:any)', 'Totalsaldoestudante::trokaraitotalsaldoestudante/$1');

$routes->get('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/trokafoto/totalsaldoestudante/(:any)', 'Totalsaldoestudante::trokafotototalsaldoestudante/$1');
$routes->post('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/trokaraifoto/totalsaldoestudante/(:any)', 'Totalsaldoestudante::trokaraifotototalsaldoestudante/$1');
$routes->post('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/rai/totalsaldoestudante', 'Totalsaldoestudante::raitotalsaldoestudante');
$routes->post('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/hamos/totalsaldoestudante', 'Totalsaldoestudante::troka');
$routes->get('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/temporario/totalsaldoestudante', 'Totalsaldoestudante::hamos');
$routes->get('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/hamoshotutemporario/totalsaldoestudante', 'Totalsaldoestudante::temporario');
$routes->post('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/hamostemporario/totalsaldoestudante', 'Totalsaldoestudante::temporario');
$routes->delete('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/permanente/totalsaldoestudante', 'Totalsaldoestudante::permanente');


// Saldo Tama Estudante Portfolio
$routes->get('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/osantamaestudanteportfolio', 'Osantamaestudanteportfolio::index');
$routes->get('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/materiaprofessores/osantamaestudanteportfolio/(:any)', 'Osantamaestudanteportfolio::show/$1');
$routes->get('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/detailestudante/osantamaestudanteportfolio/(:any)/(:any)/(:num)/(:any)/(:any)', 'Osantamaestudanteportfolio::detailvalores/$1/$2/$3/$4/$5');
$routes->get('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/detailosanpropinasdonator/osantamaestudanteportfolio/(:any)/(:any)/(:num)/(:any)/(:any)/(:any)', 'Osantamaestudanteportfolio::saldoTamaEstudantePropinasDonator/$1/$2/$3/$4/$5/$6');
$routes->post('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/aumentaSaldoTamaEstudantePropinasDonator/osantamaestudanteportfolio', 'Osantamaestudanteportfolio::aumentaSaldoTamaEstudantePropinasDonator');
$routes->post('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/trokaSaldoTamaEstudantePropinasDonator/osantamaestudanteportfolio', 'Osantamaestudanteportfolio::trokaSaldoTamaEstudantePropinasDonator');
$routes->post('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/hamosSaldoTamaEstudantePropinasDonator/osantamaestudanteportfolio', 'Osantamaestudanteportfolio::hamosSaldoTamaEstudantePropinasDonator');
$routes->post('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/hamosTemporarioSaldoTamaEstudantePropinasDonator/osantamaestudanteportfolio', 'Osantamaestudanteportfolio::hamosTemporarioSaldoTamaEstudantePropinasDonator');
$routes->get('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/temporarioSaldoTamaEstudantePropinasDonator/osantamaestudanteportfolio/(:any)/(:any)/(:num)/(:any)/(:any)/(:any)', 'Osantamaestudanteportfolio::temporarioSaldoTamaEstudantePropinasDonator/$1/$2/$3/$4/$5/$6');
$routes->delete('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/permanenteSaldoTamaEstudantePropinasDonator/osantamaestudanteportfolio', 'Osantamaestudanteportfolio::permanenteSaldoTamaEstudantePropinasDonator');
$routes->post('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/hamosHotuTemporarioSaldoTamaEstudantePropinasDonator/osantamaestudanteportfolio', 'Osantamaestudanteportfolio::hamosHotuTemporarioSaldoTamaEstudantePropinasDonator');
$routes->delete('{locale}/75y3y3tgfvbxzxmnvhgt539ujqbza256d0hcbxgdt36gslkoi5u8aqwvxbzmlkgwe1qadfzvxcjkyoutyefqvhtrywrr/permanenteHotuSaldoTamaEstudantePropinasDonator/osantamaestudanteportfolio', 'Osantamaestudanteportfolio::permanenteHotuSaldoTamaEstudantePropinasDonator');

$routes->get('{locale}/pdgwydvhavhdhaddvhwydgflu29y344t2g4rg294y9gudvh13vhavhdvqlopwy45ggwvhsdvax903urhfsbmtwliqhhxwhryw/propinasestudante', 'Propinasestudante::index');


// Osan Sai
$routes->get('{locale}/bdhyeyiowyfbaloeyqsvaxbbcmnhjalkruy783h4trf7ge29001et4629hfvanxue7485782gdhdgtr7487wgfbajbdo12gdvhagdy/osansai', 'osansai::index');
$routes->get('{locale}/bdhyeyiowyfbaloeyqsvaxbbcmnhjalkruy783h4trf7ge29001et4629hfvanxue7485782gdhdgtr7487wgfbajbdo12gdvhagdy/new/osansai', 'osansai::new');
$routes->post('{locale}/bdhyeyiowyfbaloeyqsvaxbbcmnhjalkruy783h4trf7ge29001et4629hfvanxue7485782gdhdgtr7487wgfbajbdo12gdvhagdy/aumenta/osansai', 'osansai::create');
$routes->get('{locale}/bdhyeyiowyfbaloeyqsvaxbbcmnhjalkruy783h4trf7ge29001et4629hfvanxue7485782gdhdgtr7487wgfbajbdo12gdvhagdy/edit/osansai/(:any)', 'osansai::edit/$1');
$routes->post('{locale}/bdhyeyiowyfbaloeyqsvaxbbcmnhjalkruy783h4trf7ge29001et4629hfvanxue7485782gdhdgtr7487wgfbajbdo12gdvhagdy/update/osansai/(:any)', 'osansai::update/$1');
$routes->get('{locale}/bdhyeyiowyfbaloeyqsvaxbbcmnhjalkruy783h4trf7ge29001et4629hfvanxue7485782gdhdgtr7487wgfbajbdo12gdvhagdy/show/osansai/(:any)', 'osansai::show/$1');
$routes->post('{locale}/bdhyeyiowyfbaloeyqsvaxbbcmnhjalkruy783h4trf7ge29001et4629hfvanxue7485782gdhdgtr7487wgfbajbdo12gdvhagdy/updateimage/osansai/(:any)', 'osansai::updateimage/$1');
$routes->post('{locale}/bdhyeyiowyfbaloeyqsvaxbbcmnhjalkruy783h4trf7ge29001et4629hfvanxue7485782gdhdgtr7487wgfbajbdo12gdvhagdy/delete/osansai', 'osansai::troka');
$routes->get('{locale}/bdhyeyiowyfbaloeyqsvaxbbcmnhjalkruy783h4trf7ge29001et4629hfvanxue7485782gdhdgtr7487wgfbajbdo12gdvhagdy/temporarioosansai/osansai', 'osansai::hamos');
$routes->post('{locale}/bdhyeyiowyfbaloeyqsvaxbbcmnhjalkruy783h4trf7ge29001et4629hfvanxue7485782gdhdgtr7487wgfbajbdo12gdvhagdy/hamostemporarioosansai/osansai', 'osansai::temporario');
$routes->get('{locale}/bdhyeyiowyfbaloeyqsvaxbbcmnhjalkruy783h4trf7ge29001et4629hfvanxue7485782gdhdgtr7487wgfbajbdo12gdvhagdy/hamoshotutemporarioosansai/osansai', 'osansai::temporario');
$routes->delete('{locale}/bdhyeyiowyfbaloeyqsvaxbbcmnhjalkruy783h4trf7ge29001et4629hfvanxue7485782gdhdgtr7487wgfbajbdo12gdvhagdy/permanentetemporarioosansai/osansai', 'osansai::permanente');
$routes->delete('{locale}/bdhyeyiowyfbaloeyqsvaxbbcmnhjalkruy783h4trf7ge29001et4629hfvanxue7485782gdhdgtr7487wgfbajbdo12gdvhagdy/hotupermanentetemporarioosansai/osansai', 'osansai::hamoshotupermanente');


// Saldo OSan Sai
$routes->get('{locale}/hue837790rygfa637trgfbkalofwyt3t5q6gdv973rgfjacbvzbzvjy7359204iurnfjbbt74tljsgweyqufni93rhfbhfhsbf5yy39084/saldoosansai/(:any)', 'Saldoosansai::show/$1');
$routes->get('{locale}/hue837790rygfa637trgfbkalofwyt3t5q6gdv973rgfjacbvzbzvjy7359204iurnfjbbt74tljsgweyqufni93rhfbhfhsbf5yy39084/hamossaldoosansai/saldoosansai/(:any)', 'Saldoosansai::hamos/$1');
$routes->get('{locale}/hue837790rygfa637trgfbkalofwyt3t5q6gdv973rgfjacbvzbzvjy7359204iurnfjbbt74tljsgweyqufni93rhfbhfhsbf5yy39084/aumenta/saldoosansai/(:any)', 'Saldoosansai::aumentasaldoosansai/$1');
$routes->post('{locale}/hue837790rygfa637trgfbkalofwyt3t5q6gdv973rgfjacbvzbzvjy7359204iurnfjbbt74tljsgweyqufni93rhfbhfhsbf5yy39084/create/saldoosansai', 'Saldoosansai::create');
$routes->post('{locale}/hue837790rygfa637trgfbkalofwyt3t5q6gdv973rgfjacbvzbzvjy7359204iurnfjbbt74tljsgweyqufni93rhfbhfhsbf5yy39084/temporariosaldoosansai/saldoosansai', 'Saldoosansai::temporario');
$routes->post('{locale}/hue837790rygfa637trgfbkalofwyt3t5q6gdv973rgfjacbvzbzvjy7359204iurnfjbbt74tljsgweyqufni93rhfbhfhsbf5yy39084/temporariohotusaldoosansai/saldoosansai', 'Saldoosansai::temporariohotu');
$routes->delete('{locale}/hue837790rygfa637trgfbkalofwyt3t5q6gdv973rgfjacbvzbzvjy7359204iurnfjbbt74tljsgweyqufni93rhfbhfhsbf5yy39084/hamoshotupermanentesaldoosansai/saldoosansai/(:any)', 'Saldoosansai::hamoshotupermanente/$1');
$routes->post('{locale}/hue837790rygfa637trgfbkalofwyt3t5q6gdv973rgfjacbvzbzvjy7359204iurnfjbbt74tljsgweyqufni93rhfbhfhsbf5yy39084/trokasaldoosansai/saldoosansai', 'Saldoosansai::troka');
$routes->get('{locale}/hue837790rygfa637trgfbkalofwyt3t5q6gdv973rgfjacbvzbzvjy7359204iurnfjbbt74tljsgweyqufni93rhfbhfhsbf5yy39084/exportexcel/saldoosansai/(:any)', 'Saldoosansai::exportExcel/$1');
$routes->post('{locale}/hue837790rygfa637trgfbkalofwyt3t5q6gdv973rgfjacbvzbzvjy7359204iurnfjbbt74tljsgweyqufni93rhfbhfhsbf5yy39084/importexcel/saldoosansai', 'Saldoosansai::importExcel');
$routes->get('{locale}/hue837790rygfa637trgfbkalofwyt3t5q6gdv973rgfjacbvzbzvjy7359204iurnfjbbt74tljsgweyqufni93rhfbhfhsbf5yy39084/exportpdf/saldoosansai/(:any)', 'Saldoosansai::exportPdf/$1');
$routes->delete('{locale}/hue837790rygfa637trgfbkalofwyt3t5q6gdv973rgfjacbvzbzvjy7359204iurnfjbbt74tljsgweyqufni93rhfbhfhsbf5yy39084/permanentesaldoosansai/saldoosansai', 'saldoosansai::permanente');

// Materia Kursus Funsionario
$routes->get('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/materiakursus', 'Materiakursus::index');
$routes->get('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/new/materiakursus', 'Materiakursus::new');
$routes->get('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/edit/materiakursus/(:any)', 'Materiakursus::edit/$1');
$routes->post('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/aumenta/materiakursus', 'Materiakursus::create');
$routes->post('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/update/materiakursus/(:any)', 'Materiakursus::update/$1');
$routes->post('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/delete/materiakursus', 'Materiakursus::troka');

// Materia Kursus Funsionario
$routes->get('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/materiakursusportfolio', 'Materiakursusportfolio::index');
$routes->get('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/hamosmateriakursus/materiakursusportfolio', 'Materiakursusportfolio::hamosmateriakursus');
$routes->get('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/new/materiakursusportfolio', 'Materiakursusportfolio::new');
$routes->get('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/edit/materiakursusportfolio/(:any)', 'Materiakursusportfolio::edit/$1');
$routes->post('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/aumenta/materiakursusportfolio', 'Materiakursusportfolio::create');
$routes->post('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/hamoshotutemporario/materiakursusportfolio', 'Materiakursusportfolio::hamoshotutemporario');
$routes->post('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/hamostemporario/materiakursusportfolio', 'Materiakursusportfolio::hamostemporario');
$routes->delete('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/permanentemateriakursus/materiakursusportfolio', 'Materiakursusportfolio::hamospermanente');
$routes->delete('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/permanentehotumateriakursus/materiakursusportfolio', 'Materiakursusportfolio::hamoshotupermanente');
$routes->post('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/update/materiakursusportfolio/(:any)', 'Materiakursusportfolio::update/$1');
$routes->post('{locale}/get46ueygvhvhvmdkuehagfvf902ydhbdvfy3yasq123jkflorpjdnbbbgcxzy367gdabcbzafgdhfbwyryy63poejfhg3gdvnjdjwggry2/delete/materiakursusportfolio', 'Materiakursusportfolio::troka');

// Subsidio Portfolio
$routes->get('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/subsidioportfolio', 'Subsidioportfolio::index');
$routes->get('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/new/subsidioportfolio/(:any)', 'Subsidioportfolio::newsubsidio/$1');
$routes->get('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/show/subsidioportfolio/(:any)', 'Subsidioportfolio::show/$1');
$routes->post('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/create/subsidioportfolio', 'Subsidioportfolio::create');
$routes->get('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/edit/subsidioportfolio/(:any)', 'Subsidioportfolio::edit/$1');
$routes->post('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/update/subsidioportfolio/(:any)', 'Subsidioportfolio::update/$1');
$routes->post('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/trokasubsidio/subsidioportfolio', 'Subsidioportfolio::trokasubsidio');
$routes->get('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/hamossubsidio/subsidioportfolio/(:any)', 'Subsidioportfolio::hamossubsidio/$1');
$routes->post('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/temporariosubsidiohotu/subsidioportfolio', 'Subsidioportfolio::temporariosubsidiohotu');
$routes->delete('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/permanentesubsidiohotu/subsidioportfolio', 'Subsidioportfolio::permanentesubsidiohotu');
$routes->post('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/temporariosubsidio/subsidioportfolio', 'Subsidioportfolio::temporariosubsidio');
$routes->delete('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/hamospermanente/subsidioportfolio', 'Subsidioportfolio::hamospermanente');
$routes->get('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/exportPdf/subsidioportfolio/(:any)', 'Subsidioportfolio::exportPdf/$1');
$routes->get('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/exportExcel/subsidioportfolio/(:any)', 'Subsidioportfolio::exportExcel/$1');

// Subsidio Funsionario
$routes->get('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/subsidiofunsionario', 'Subsidiofunsionario::index');
$routes->get('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/new/subsidiofunsionario/(:num)', 'Subsidiofunsionario::newsubsidio/$1');
$routes->get('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/show/subsidiofunsionario/(:any)', 'Subsidiofunsionario::show/$1');
$routes->post('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/create/subsidiofunsionario', 'Subsidiofunsionario::create');
$routes->get('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/edit/subsidiofunsionario/(:any)', 'Subsidiofunsionario::edit/$1');
$routes->post('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/update/subsidiofunsionario/(:any)', 'Subsidiofunsionario::update/$1');
$routes->post('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/trokasubsidio/subsidiofunsionario', 'Subsidiofunsionario::trokasubsidio');
$routes->get('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/exportPdf/subsidiofunsionario/(:any)', 'Subsidiofunsionario::exportPdf/$1');
$routes->get('{locale}/hshshklei46truhw7838fhbvzxassfhjklopqy46tdgaveherhjlkfggey6esf352fdgvzxaq13hfu87rgcbdvvwtlop093uhsgrvhrywq23h/exportExcel/subsidiofunsionario/(:any)', 'Subsidiofunsionario::exportExcel/$1');