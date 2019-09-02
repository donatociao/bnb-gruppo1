<?php

use App\Apartment;
use Illuminate\Database\Seeder;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $titleApart = [
        "Lussuoso. Vista Incantevole",
        "Vacanze nel verde, aria pulita",
        "Splendido appartamento per posizione",
        "Fantastico, vista mare mozzafiato",
        "Economico monolocale in centro città",
        "Appartamento in casa indipendente con vista straordinaria",
        "Dimora tipica della zona",
        "OFFERTA - Centro storico, prezzo imbattibile",
        "Villetta degli Usignoli, un'opportunità",
        "Intera Villa, con 3 appartamenti e zona esterna",
        "Attico spazioso, con vista sul paesaggio",
        "Incantevole resort in centro storico, con numerosi servizi inclusi",
        "Central panoramic apartment!",
        "appartamento 3 stanze, 2/5 persone",
        "Villetta Santa Chiara, ottima posizione",
        "Monolocale in casale di campagna",
        "Luminoso appartamento, centro città, un gioiello",
        "Spazioso e silenzioso, a due passi dal centro",
      ];

      $imgApart = [
        "http://appartamentimartina.it/wp/wp-content/uploads/2017/05/8_JAN_4736appartamento.jpg",
        "https://www.garnilagonembia.com/images/_gallery%20divise/04_formula%20appartamento/bilocale/salotto_bilo.jpg",
        "https://appartamentisirmione.it/wp-content/uploads/2016/03/DP_7511-1.jpg",
        "https://www.artimino.com/it/img/appartamenti/bilocale/vista-su-soggiorno-appartamenti-bilocale-artimino.jpg",
        "http://cdn.opisas.com/newopisas/2015-06-10_72713_3OJ5fwunIBMcTZQLBe1mamaajN0atdnGruM3z2nW7XU.crop-box-16-9.jpg",
        "http://www.residencesolemare.com/images/big/appartamenti_esterni03.JPG",
        "https://imganuncios.mitula.net/appartamento_3_locali_alessandrino_spazi_esterni_7270135543938262235.jpg",
        "https://www.angelaappartamenti.it/wp-content/uploads/2018/11/angela-appartamenti-rozzano-esterno-1-1000x650.jpg",
        "https://images.trvl-media.com/hotels/35000000/34950000/34947500/34947438/d7ac243d_z.jpg",
        "http://www.lecasetteafavignana.it/wp-content/uploads/2017/05/MG_2394.jpg",
        "http://www.tecnoshopsrl.it/blog/wp-content/uploads/2015/06/illuminazione-esterno.jpg",
        "https://static.bakeca.it/immagini/e1f/case-in-vendita-belmonte-mezzagno-intera-villa-con-3-e1fcf14ce89748b1ee0e90ad5b249ed0.jpg",
        "https://www.casavacanzepinzolo.it/wp-content/uploads/2013/05/MG_5668-940x529.jpg",
        "http://villaggiodellasalutepiu.s3-website-eu-west-1.amazonaws.com/upload/img/877-appartamento-bologna.jpg",
        "https://www.casagest24.it/foto/831464-30j16xf.jpeg",
        "https://www.albarella.it/public/crop/residence-bilocali-a2-83a4d6c70e6e0e5a35f2a82f656639b9-frontend-templ-c6.jpg?v=13",
        "https://odis.homeaway.com/odis/listing/3d94d15c-ba57-4535-923e-89bde96de09e.c10.jpg",
        "https://agestanet.risorseimmobiliari.it/public/annunci/04471/0584256/F_994360.jpg",
        "http://www.cesenaticoholidays.com/Images/apartments/cesenatico/ponente/villa%20dei%20sogni/villaSogni_esterno1.jpg",
        "http://www.maisonbellevue.it/images/rooms/moulin/001.jpg",
      ];

      for ($i=0; $i < 20; $i++) {
        $apart = new Apartment();
        $apart->title = array_rand(array_flip($titleApart),1);
        $apart->rooms_number = rand(1,4);
        $apart->host_number = rand(1,8);
        $apart->wc_number = rand(1,3);
        $apart->mq = rand(40,200);
        $apart->url_img = array_rand(array_flip($imgApart),1);
        $apart->service_id = rand(1,20);
        $apart->address_id = rand(1,20);
        $apart->user_id = rand(1,5);
        $apart->save();
      }
    }
}
