<?php
/**
 * This class is just to add some data to the cache to be able to do something
 */

namespace Src\Controller;

use Src\Entities\Lead;

class DataSeedController {

    public static function clearAllCache(){
        // the path is relative to the index.php file, not this class
        if(file_exists('../Test-case/client_token.txt')){
            unlink('../Test-case/client_token.txt');
        }
        apcu_clear_cache();
    }

    /**
     * This is to generate some random data to have in place to be able to test the api
     */
    public static function plantDataSeeds(){
        // this are users details to get tokens
        apcu_add('user_AleVH', 'SuperSecret!');
        apcu_add('user_Akkroo', 'giveMeTheJob!');
        apcu_add('user_Random1', '123#');
        apcu_add('user_Random2', 'anotherPw');

        // this is data from leads to test GET requests
        $leads_examples = array(
            array(
                "first_name" => "Odessa",
                "last_name" => "Potter",
                "email" => "at.auctor.ullamcorper@ultrices.ca",
                "company" => "Elit Pretium Ltd",
                "post_code" => "3579"
            ),
            array(
                "first_name" => "Cameron",
                "last_name" => "Barr",
                "email" => "ac@egetmetuseu.co.uk",
                "company" => "Varius Orci In Inc.",
                "post_code" => "A9G 9G8"
            ),
            array(
                "first_name" => "Yoshi",
                "last_name" => "Conrad",
                "email" => "Suspendisse.aliquet.molestie@pedesagittisaugue.com",
                "company" => "Maecenas Consulting",
                "post_code" => "986432"
            ),
            array(
                "first_name" => "Lawrence",
                "last_name" => "Daniel",
                "email" => "libero@semconsequatnec.org",
                "company" => "Neque Venenatis Company",
                "post_code" => "Y9J 7S0"
            ),
            array(
                "first_name" => "Lani",
                "last_name" => "Mcdonald",
                "email" => "at.pede@odioNaminterdum.com",
                "company" => "Enim Sit Amet LLC",
                "post_code" => "278857"
            ),
            array(
                "first_name" => "Graiden",
                "last_name" => "Rutledge",
                "email" => "dolor.nonummy@sociisnatoque.ca",
                "company" => "Luctus Vulputate Nisi Company",
                "post_code" => "9152 SX"
            ),
            array(
                "first_name" => "Florence",
                "last_name" => "Carrillo",
                "email" => "risus.Morbi.metus@aliquetPhasellusfermentum.ca",
                "company" => "Non Lacinia Incorporated",
                "post_code" => "22137"
            ),
            array(
                "first_name" => "Germaine",
                "last_name" => "Dalton",
                "email" => "pede@porttitorscelerisqueneque.ca",
                "company" => "Non Associates",
                "post_code" => "89553"
            ),
            array(
                "first_name" => "Quyn",
                "last_name" => "Ellis",
                "email" => "urna.et.arcu@ipsumporta.net",
                "company" => "Urna Nunc Institute",
                "post_code" => "65596"
            ),
            array(
                "first_name" => "Lara",
                "last_name" => "Heath",
                "email" => "dolor@Inmi.net",
                "company" => "Sem Mollis Dui Corporation",
                "post_code" => "11134"
            ),
            array(
                "first_name" => "Thor",
                "last_name" => "Mcclure",
                "email" => "lectus.quis.massa@senectus.co.uk",
                "company" => "Velit Cras Lorem Corporation",
                "post_code" => "B45 6CT"
            ),
            array(
                "first_name" => "Tiger",
                "last_name" => "Delacruz",
                "email" => "Nunc@etmagnisdis.org",
                "company" => "Non Arcu Vivamus Ltd",
                "post_code" => "11661"
            ),
            array(
                "first_name" => "Aidan",
                "last_name" => "Mathews",
                "email" => "Pellentesque@etlaciniavitae.net",
                "company" => "In Institute",
                "post_code" => "03754"
            ),
            array(
                "first_name" => "Silas",
                "last_name" => "Juarez",
                "email" => "et@Integerurna.org",
                "company" => "Commodo Auctor Company",
                "post_code" => "23550"
            ),
            array(
                "first_name" => "Sage",
                "last_name" => "Weeks",
                "email" => "enim.Etiam@DonecegestasAliquam.ca",
                "company" => "Nascetur Ridiculus Mus Corporation",
                "post_code" => "233775"
            ),
            array(
                "first_name" => "Britanni",
                "last_name" => "Valenzuela",
                "email" => "leo@tellus.org",
                "company" => "Orci Consulting",
                "post_code" => "484723"
            ),
            array(
                "first_name" => "Adara",
                "last_name" => "Guerra",
                "email" => "vel@miacmattis.ca",
                "company" => "Eget Odio LLC",
                "post_code" => "09109"
            ),
            array(
                "first_name" => "Sage",
                "last_name" => "Chandler",
                "email" => "accumsan.neque.et@volutpatornare.ca",
                "company" => "Montes Nascetur Limited",
                "post_code" => "X6C 8A6"
            ),
            array(
                "first_name" => "Ayanna",
                "last_name" => "Hodges",
                "email" => "Nunc.sed@fringillaornareplacerat.net",
                "company" => "Tellus Sem Mollis Institute",
                "post_code" => "04-668"
            ),
            array(
                "first_name" => "Hector",
                "last_name" => "Hewitt",
                "email" => "Cras@molestieintempus.net",
                "company" => "Vivamus Nibh Dolor Inc.",
                "post_code" => "14165"
            ),
            array(
                "first_name" => "Patience",
                "last_name" => "Wolfe",
                "email" => "Sed.neque@adipiscing.edu",
                "company" => "Donec Felis Foundation",
                "post_code" => "H19 0HO"
            ),
            array(
                "first_name" => "Christine",
                "last_name" => "Hebert",
                "email" => "est.Nunc.laoreet@sempererat.net",
                "company" => "Metus Aliquam Erat Institute",
                "post_code" => "30366"
            ),
            array(
                "first_name" => "Jin",
                "last_name" => "Durham",
                "email" => "sit.amet.ante@fringillaornare.com",
                "company" => "Lectus Pede Incorporated",
                "post_code" => "8062"
            ),
            array(
                "first_name" => "Wilma",
                "last_name" => "Black",
                "email" => "eget.volutpat@scelerisque.co.uk",
                "company" => "Massa Integer Vitae Associates",
                "post_code" => "240703"
            ),
            array(
                "first_name" => "Guy",
                "last_name" => "Murphy",
                "email" => "fringilla.est@euismod.org",
                "company" => "Facilisi Foundation",
                "post_code" => "68569"
            ),
            array(
                "first_name" => "Leslie",
                "last_name" => "Hebert",
                "email" => "varius.orci.in@eleifendnuncrisus.net",
                "company" => "Mauris Associates",
                "post_code" => "21157"
            ),
            array(
                "first_name" => "Rhea",
                "last_name" => "Coleman",
                "email" => "mi.lorem.vehicula@nonarcu.org",
                "company" => "Orci Consulting",
                "post_code" => "1194"
            ),
            array(
                "first_name" => "Adria",
                "last_name" => "Valentine",
                "email" => "Quisque@orcitinciduntadipiscing.ca",
                "company" => "Magna Malesuada Vel Corp.",
                "post_code" => "M8 0NW"
            ),
            array(
                "first_name" => "Lareina",
                "last_name" => "Dunn",
                "email" => "tempus.risus@bibendumsedest.edu",
                "company" => "Suspendisse Associates",
                "post_code" => "L89 0KT"
            ),
            array(
                "first_name" => "Wendy",
                "last_name" => "Wilkins",
                "email" => "Nullam.vitae.diam@estvitaesodales.edu",
                "company" => "Senectus Et Netus LLC",
                "post_code" => "RS43 8AU"
            ),
            array(
                "first_name" => "Thor",
                "last_name" => "Guerra",
                "email" => "scelerisque@adipiscing.ca",
                "company" => "Donec Est Limited",
                "post_code" => "31259"
            ),
            array(
                "first_name" => "Idola",
                "last_name" => "Giles",
                "email" => "Nam.consequat.dolor@turpisegestasAliquam.ca",
                "company" => "Non Consulting",
                "post_code" => "49882"
            ),
            array(
                "first_name" => "Kyla",
                "last_name" => "Anthony",
                "email" => "quis@Aliquam.org",
                "company" => "Nisl Sem Industries",
                "post_code" => "5349"
            ),
            array(
                "first_name" => "Kenneth",
                "last_name" => "Fitzpatrick",
                "email" => "nonummy.ipsum.non@cursuseteros.org",
                "company" => "Et Commodo Institute",
                "post_code" => "025394"
            ),
            array(
                "first_name" => "Sandra",
                "last_name" => "Tucker",
                "email" => "ultrices.Vivamus@lorem.ca",
                "company" => "Aliquam Erat Volutpat Incorporated",
                "post_code" => "2070"
            ),
            array(
                "first_name" => "Upton",
                "last_name" => "Black",
                "email" => "rutrum.lorem@magnaLoremipsum.net",
                "company" => "Odio Nam Interdum Company",
                "post_code" => "01338"
            ),
            array(
                "first_name" => "Levi",
                "last_name" => "Hester",
                "email" => "sit.amet.lorem@eleifendegestasSed.co.uk",
                "company" => "Magna Lorem Ipsum PC",
                "post_code" => "9518 LF"
            ),
            array(
                "first_name" => "Avye",
                "last_name" => "Cross",
                "email" => "lectus@Vivamusrhoncus.com",
                "company" => "Molestie Tellus PC",
                "post_code" => "40229"
            ),
            array(
                "first_name" => "Sylvia",
                "last_name" => "Lindsey",
                "email" => "ipsum.leo.elementum@vel.edu",
                "company" => "Ullamcorper Duis At Incorporated",
                "post_code" => "8524"
            ),
            array(
                "first_name" => "James",
                "last_name" => "Wiggins",
                "email" => "aliquet@feugiatSed.ca",
                "company" => "Metus Urna Convallis Consulting",
                "post_code" => "MK1W 3WD"
            ),
            array(
                "first_name" => "Elliott",
                "last_name" => "Mejia",
                "email" => "tincidunt.Donec@malesuada.edu",
                "company" => "Mauris Ut PC",
                "post_code" => "32148"
            ),
            array(
                "first_name" => "Xantha",
                "last_name" => "Byrd",
                "email" => "sem@habitant.edu",
                "company" => "Lacinia Mattis Integer LLP",
                "post_code" => "87725"
            ),
            array(
                "first_name" => "Oprah",
                "last_name" => "Cantrell",
                "email" => "venenatis.a.magna@suscipit.edu",
                "company" => "Vitae Risus Duis Institute",
                "post_code" => "10005"
            ),
            array(
                "first_name" => "Linus",
                "last_name" => "Orr",
                "email" => "Duis@nulla.com",
                "company" => "Parturient Inc.",
                "post_code" => "5964"
            ),
            array(
                "first_name" => "Walter",
                "last_name" => "Heath",
                "email" => "sed.dolor@sitametorci.ca",
                "company" => "Sapien Company",
                "post_code" => "401309"
            ),
            array(
                "first_name" => "Keegan",
                "last_name" => "Branch",
                "email" => "facilisis@ametmetus.ca",
                "company" => "Risus Morbi Consulting",
                "post_code" => "215548"
            ),
            array(
                "first_name" => "Tamara",
                "last_name" => "Vazquez",
                "email" => "venenatis.lacus.Etiam@eleifendvitae.net",
                "company" => "Eu Sem LLP",
                "post_code" => "88819"
            ),
            array(
                "first_name" => "Cameron",
                "last_name" => "Rollins",
                "email" => "Nullam.ut.nisi@consectetueradipiscing.net",
                "company" => "Donec Non Inc.",
                "post_code" => "12541-411"
            ),
            array(
                "first_name" => "Emerald",
                "last_name" => "Whitley",
                "email" => "gravida@lorem.co.uk",
                "company" => "Placerat LLP",
                "post_code" => "7087 YY"
            ),
            array(
                "first_name" => "Tyler",
                "last_name" => "Mcleod",
                "email" => "Ut.tincidunt.vehicula@nuncinterdumfeugiat.co.uk",
                "company" => "Leo Incorporated",
                "post_code" => "70406"
            ),
            array(
                "first_name" => "Ulysses",
                "last_name" => "Mendoza",
                "email" => "lacus@Pellentesque.com",
                "company" => "Natoque Penatibus Ltd",
                "post_code" => "X9K 3M1"
            ),
            array(
                "first_name" => "Roanna",
                "last_name" => "Fletcher",
                "email" => "nunc.sed.pede@lectusjusto.com",
                "company" => "Mi Fringilla Corporation",
                "post_code" => "938379"
            ),
            array(
                "first_name" => "Carolyn",
                "last_name" => "Moore",
                "email" => "vel.arcu@nonarcu.co.uk",
                "company" => "Nulla LLP",
                "post_code" => "4650"
            ),
            array(
                "first_name" => "Gretchen",
                "last_name" => "Kent",
                "email" => "Proin.vel@massaSuspendisseeleifend.ca",
                "company" => "Nonummy Ipsum Non Consulting",
                "post_code" => "908405"
            ),
            array(
                "first_name" => "Connor",
                "last_name" => "Mccarthy",
                "email" => "Aenean.massa@orciUt.ca",
                "company" => "Lorem Eu Metus PC",
                "post_code" => "92026"
            ),
            array(
                "first_name" => "Sasha",
                "last_name" => "Davenport",
                "email" => "Donec@iaculislacuspede.ca",
                "company" => "At LLP",
                "post_code" => "05338"
            ),
            array(
                "first_name" => "Nevada",
                "last_name" => "Casey",
                "email" => "dolor.egestas.rhoncus@nonquamPellentesque.org",
                "company" => "Adipiscing Elit Aliquam Corp.",
                "post_code" => "20274"
            ),
            array(
                "first_name" => "Noble",
                "last_name" => "Winters",
                "email" => "ut@tincidunt.org",
                "company" => "Non LLP",
                "post_code" => "145893"
            ),
            array(
                "first_name" => "Delilah",
                "last_name" => "Mckinney",
                "email" => "pharetra@vulputate.org",
                "company" => "Consectetuer Cursus Et Incorporated",
                "post_code" => "33957"
            ),
            array(
                "first_name" => "Aubrey",
                "last_name" => "Dixon",
                "email" => "elementum@placerat.org",
                "company" => "Cum Sociis Inc.",
                "post_code" => "N0P 3Z0"
            ),
            array(
                "first_name" => "Britanney",
                "last_name" => "Buckner",
                "email" => "sed.sapien@Duiselementum.ca",
                "company" => "Phasellus At Augue PC",
                "post_code" => "2770"
            ),
            array(
                "first_name" => "Jin",
                "last_name" => "Blanchard",
                "email" => "luctus.lobortis@massaMaurisvestibulum.edu",
                "company" => "Nullam Ut Institute",
                "post_code" => "41218"
            ),
            array(
                "first_name" => "Chester",
                "last_name" => "Good",
                "email" => "Quisque.purus.sapien@Aeneaneuismodmauris.edu",
                "company" => "Maecenas Iaculis Incorporated",
                "post_code" => "4102 HX"
            ),
            array(
                "first_name" => "Guinevere",
                "last_name" => "Oliver",
                "email" => "tempor@lacus.com",
                "company" => "Lectus Pede Limited",
                "post_code" => "43817"
            ),
            array(
                "first_name" => "Quinn",
                "last_name" => "Dorsey",
                "email" => "Quisque@Donecvitaeerat.ca",
                "company" => "Augue Malesuada Company",
                "post_code" => "51661"
            ),
            array(
                "first_name" => "Denise",
                "last_name" => "Padilla",
                "email" => "rhoncus.Proin.nisl@acfermentumvel.edu",
                "company" => "Velit Pellentesque Ltd",
                "post_code" => "20676"
            ),
            array(
                "first_name" => "Linda",
                "last_name" => "Ballard",
                "email" => "Cras.sed@molestietortor.com",
                "company" => "Lorem Auctor Quis Industries",
                "post_code" => "2700 RN"
            ),
            array(
                "first_name" => "Jacqueline",
                "last_name" => "Ashley",
                "email" => "fringilla@Donecatarcu.com",
                "company" => "Dictum PC",
                "post_code" => "XR62 5BR"
            ),
            array(
                "first_name" => "Conan",
                "last_name" => "Stafford",
                "email" => "auctor@fringillaestMauris.com",
                "company" => "Sed Dictum Proin Institute",
                "post_code" => "24-742"
            ),
            array(
                "first_name" => "Chadwick",
                "last_name" => "Greene",
                "email" => "Phasellus.vitae@consequat.com",
                "company" => "Erat Semper LLP",
                "post_code" => "05547-444"
            ),
            array(
                "first_name" => "Emily",
                "last_name" => "Noel",
                "email" => "tellus.Phasellus@dictumsapien.edu",
                "company" => "Orci LLC",
                "post_code" => "63760"
            ),
            array(
                "first_name" => "Lael",
                "last_name" => "Beck",
                "email" => "risus.varius@facilisisloremtristique.net",
                "company" => "Ut Ipsum Ac Incorporated",
                "post_code" => "21269"
            ),
            array(
                "first_name" => "Neville",
                "last_name" => "Santana",
                "email" => "metus.eu.erat@parturientmontes.net",
                "company" => "Odio Aliquam Vulputate Consulting",
                "post_code" => "30906"
            ),
            array(
                "first_name" => "Dacey",
                "last_name" => "Wood",
                "email" => "montes@dui.co.uk",
                "company" => "Posuere Vulputate Lacus LLP",
                "post_code" => "E2T 2B0"
            ),
            array(
                "first_name" => "Hyacinth",
                "last_name" => "Huff",
                "email" => "eu.enim@eu.com",
                "company" => "Libero Proin Institute",
                "post_code" => "01196"
            ),
            array(
                "first_name" => "Sopoline",
                "last_name" => "Turner",
                "email" => "massa.Quisque.porttitor@sitamet.edu",
                "company" => "Dictum Magna Corp.",
                "post_code" => "8564"
            ),
            array(
                "first_name" => "Daria",
                "last_name" => "Hewitt",
                "email" => "quis.tristique.ac@nondapibus.edu",
                "company" => "Est Ac Facilisis Company",
                "post_code" => "50052"
            ),
            array(
                "first_name" => "Armand",
                "last_name" => "Ellison",
                "email" => "sagittis@estacmattis.edu",
                "company" => "Donec Associates",
                "post_code" => "1966 YG"
            ),
            array(
                "first_name" => "Clio",
                "last_name" => "Frederick",
                "email" => "diam.nunc@Nam.com",
                "company" => "Consectetuer Mauris Id LLC",
                "post_code" => "58709"
            ),
            array(
                "first_name" => "Eugenia",
                "last_name" => "Chambers",
                "email" => "velit.dui.semper@etpedeNunc.edu",
                "company" => "Nec Urna Et Industries",
                "post_code" => "90252-838"
            ),
            array(
                "first_name" => "Coby",
                "last_name" => "Harmon",
                "email" => "risus@vitaemaurissit.org",
                "company" => "Donec Egestas Aliquam Corp.",
                "post_code" => "5038"
            ),
            array(
                "first_name" => "Samantha",
                "last_name" => "Gentry",
                "email" => "sapien.cursus@magnaa.co.uk",
                "company" => "Aliquam Nisl Industries",
                "post_code" => "VX4U 8XO"
            ),
            array(
                "first_name" => "Macon",
                "last_name" => "Casey",
                "email" => "dolor.sit.amet@arcuiaculisenim.net",
                "company" => "Rutrum Magna Cras Corporation",
                "post_code" => "1476"
            ),
            array(
                "first_name" => "Reuben",
                "last_name" => "Hansen",
                "email" => "nunc.ullamcorper.eu@ligulaAenean.co.uk",
                "company" => "Dui Limited",
                "post_code" => "2560 SF"
            ),
            array(
                "first_name" => "Quinlan",
                "last_name" => "Mosley",
                "email" => "Integer@laciniaSed.co.uk",
                "company" => "Iaculis Company",
                "post_code" => "7893"
            ),
            array(
                "first_name" => "Oliver",
                "last_name" => "Lamb",
                "email" => "ac@sapienNunc.com",
                "company" => "In Tempus Eu Corporation",
                "post_code" => "5037"
            ),
            array(
                "first_name" => "Naomi",
                "last_name" => "Benson",
                "email" => "est.Mauris.eu@eutemporerat.ca",
                "company" => "Nisi PC",
                "post_code" => "94092-849"
            ),
            array(
                "first_name" => "Haley",
                "last_name" => "Gibbs",
                "email" => "molestie.tortor@egetlaoreet.com",
                "company" => "Vulputate Associates",
                "post_code" => "Z9Y 8QL"
            ),
            array(
                "first_name" => "Madeson",
                "last_name" => "Austin",
                "email" => "Proin.velit@odiovel.ca",
                "company" => "Integer Mollis Integer Ltd",
                "post_code" => "7876"
            ),
            array(
                "first_name" => "Cairo",
                "last_name" => "Nelson",
                "email" => "dictum.sapien@fermentum.com",
                "company" => "Nisi Mauris Company",
                "post_code" => "5230"
            ),
            array(
                "first_name" => "Kato",
                "last_name" => "Talley",
                "email" => "luctus.felis.purus@Nunc.net",
                "company" => "Aenean Eget Metus Associates",
                "post_code" => "13823"
            ),
            array(
                "first_name" => "Georgia",
                "last_name" => "Hutchinson",
                "email" => "ullamcorper.eu.euismod@nonlobortis.org",
                "company" => "Lacus Nulla Tincidunt Corporation",
                "post_code" => "8630"
            ),
            array(
                "first_name" => "Britanney",
                "last_name" => "Arnold",
                "email" => "amet.massa@elementum.org",
                "company" => "Mauris Aliquam Industries",
                "post_code" => "70509"
            ),
            array(
                "first_name" => "Christen",
                "last_name" => "Richard",
                "email" => "et@ipsumdolor.com",
                "company" => "Leo Cras Vehicula Corp.",
                "post_code" => "4388"
            ),
            array(
                "first_name" => "Blair",
                "last_name" => "Blair",
                "email" => "enim.consequat.purus@Suspendisse.edu",
                "company" => "Habitant Morbi Corporation",
                "post_code" => "3919"
            ),
            array(
                "first_name" => "Bell",
                "last_name" => "Hogan",
                "email" => "quis.tristique@anuncIn.com",
                "company" => "Nascetur Ridiculus Mus PC",
                "post_code" => "68-833"
            ),
            array(
                "first_name" => "Odessa",
                "last_name" => "Ochoa",
                "email" => "interdum@a.org",
                "company" => "Sit Amet Ante Consulting",
                "post_code" => "7924"
            ),
            array(
                "first_name" => "Paula",
                "last_name" => "Norris",
                "email" => "et.nunc.Quisque@laoreetlectusquis.ca",
                "company" => "Phasellus Elit Pede LLP",
                "post_code" => "6319"
            ),
            array(
                "first_name" => "Pandora",
                "last_name" => "Pruitt",
                "email" => "ipsum.Suspendisse.non@anteMaecenasmi.co.uk",
                "company" => "Parturient Montes Corporation",
                "post_code" => "70696"
            ),
            array(
                "first_name" => "Kadeem",
                "last_name" => "Le",
                "email" => "et.magnis.dis@commodo.ca",
                "company" => "Arcu Aliquam Incorporated",
                "post_code" => "J2E 1X0"
            )
        );
        foreach ($leads_examples as $a_lead){
            $new_lead = new Lead($a_lead['first_name'], $a_lead['last_name'], $a_lead['email'], true, $a_lead['company'], $a_lead['post_code']);
            if(apcu_store('lead_'.$new_lead->getLeadIndex(), $new_lead->toArray())){
                echo "OK index ".$new_lead->getLeadIndex()."\n";
            }else{
                echo "ERROR index ".$new_lead->getLeadIndex()."\n";
            }
        }
    }
}