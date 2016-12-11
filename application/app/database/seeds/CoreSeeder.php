<?php


// Run the database seeds for the core elements of app.
class CoreSeeder extends Seeder
{
	public function run()
	{
		$this->call('LanguagesSeeder');
		$this->call('UserRolesSeeder');
		$this->call('DefaultUsersSeeder');
		$this->call('RegionSeeder');
		$this->call('CitySeeder');
		$this->call('UserSeeder');
		$this->call('AreaSeeder');
		$this->call('MediaSeeder');
		$this->call('CategoriesSeeder');
		$this->call('ProductWeightSeeder');
		$this->call('ProductsSeeder');
		$this->call('BlogSeeder');
		$this->call('AboutSeeder');
		$this->call('WorkshopSeeder');
		$this->call('ContactSeeder');
		$this->call('ProductPostsSeeder');
		$this->call('AccommodationSeeder');
		$this->call('BlitzPostSeeder');
	}
}

// Seeds languages
class LanguagesSeeder extends Seeder
{
	public function run()
	{
		Language::create(array('iso_tag' => 'en', 'language' => 'English'));
		Language::create(array('iso_tag' => 'hr', 'language' => 'Croatian', 'local_name' => 'Hrvatski'));
		Language::create(array('iso_tag' => 'de', 'language' => 'German', 'local_name' => 'Deutsch'));
	}
}

// Seeds user roles
class UserRolesSeeder extends Seeder
{
	public function run()
	{
		// This is we. We control the system. We are the law!
		Role::create(array('name' => 'superadmin'));

		// These are the administrators.
		Role::create(array('name' => 'admin'));

		// These are managers.
		Role::create(array('name' => 'manager'));

		// These are employees.
		Role::create(array('name' => 'employee'));

		// These are people, just ordinary users.
		Role::create(array('name' => 'user'));

		// These are anonymously logged-in users.
		// Not THE Anonymous, like, hackers and stuff.
		// Though, maybe some of them are of the Anonymous!
		// We will never know. Or will we?
		// *cue dramatic music*
		Role::create(array('name' => 'anonymous'));
	}
}


// Seeds default users
class DefaultUsersSeeder extends Seeder
{
	public function run()
	{
		// Seed admin user (2)
		$defaultuser = new User();
		$defaultuser->email = 'admin@gmail.com';
		$defaultuser->password = Hash::make('123456');

		$defaultuser->user_group = 'admin';
		$defaultuser->username = 'admin';
		$defaultuser->first_name = 'Stipe';
		$defaultuser->last_name = 'Dumančić';

		$defaultuser->save();

		$defaultuser->attachRole(2); // admin

	}
}
 
 
class RegionSeeder extends Seeder
{

	public function run()
	{
		Region::create(array('name' => 'Zagrebačka županija', 'permalink' => 'zagrebacka-zupanija'));
		Region::create(array('name' => 'Krapinsko-zagorska županija', 'permalink' => 'krapinsko-zagorska-zupanija'));
		Region::create(array('name' => 'Sisačko-moslavačka županija', 'permalink' => 'sisacko-moslavacka-zupanija'));
		Region::create(array('name' => 'Karlovačka županija', 'permalink' => 'karlovacka-zupanija'));
		Region::create(array('name' => 'Varaždinska županija', 'permalink' => 'varazdinska-zupanija'));
		Region::create(array('name' => 'Koprivničko-križevačka županija', 'permalink' => 'koprivnicko-krizevacka-zupanija'));
		Region::create(array('name' => 'Bjelovarsko-bilogorska županija', 'permalink' => 'bjelovarsko-bilogorska-zupanija'));
		Region::create(array('name' => 'Primorsko-goranska županija', 'permalink' => 'primorsko-goranska-zupanija'));
		Region::create(array('name' => 'Ličko-senjska županija', 'permalink' => 'licko-senjska-zupanija'));
		Region::create(array('name' => 'Virovitičko-podravska županija', 'permalink' => 'viroviticko-podravska-zupanija'));
		Region::create(array('name' => 'Požeško-slavonska županija', 'permalink' => 'pozesko-slavonska-zupanija'));
		Region::create(array('name' => 'Brodsko-posavska županija', 'permalink' => 'brodsko-posavska-zupanija'));
		Region::create(array('name' => 'Zadarska županija', 'permalink' => 'zadarska-zupanija'));
		Region::create(array('name' => 'Osječko-baranjska županija', 'permalink' => 'osjecko-baranjska-zupanija'));
		Region::create(array('name' => 'Šibensko-kninska županija', 'permalink' => 'sibensko-kninska-zupanija'));
		Region::create(array('name' => 'Vukovarsko-srijemska županija', 'permalink' => 'vukovarsko-srijemska-zupanija'));
		Region::create(array('name' => 'Splitsko-dalmatinska županija', 'permalink' => 'splitsko-dalmatinska-zupanija'));
		Region::create(array('name' => 'Istarska županija', 'permalink' => 'istarska-zupanija'));
		Region::create(array('name' => 'Dubrovačko-neretvanska županija', 'permalink' => 'dubrovacko-neretvanska-zupanija'));
		Region::create(array('name' => 'Međimurska županija', 'permalink' => 'medimurska-zupanija'));
		Region::create(array('name' => 'Grad Zagreb', 'permalink' => 'grad-zagreb'));
	}
}



class ProductWeightSeeder extends Seeder
{
	public function run()
	{
		ProductsWeight::create(array('title' => '8 Kila', 'product_weight' => '8', 'measure_unit' => 'kg'));
		ProductsWeight::create(array('title' => '4 Kila', 'product_weight' => '4', 'measure_unit' => 'kg'));
		ProductsWeight::create(array('title' => 'BiB', 'product_weight' => '5', 'measure_unit' => 'l'));
		ProductsWeight::create(array('title' => 'Teglica 314 ml', 'product_weight' => '314', 'measure_unit' => 'ml'));
		ProductsWeight::create(array('title' => 'Teglica 370 ml', 'product_weight' => '370', 'measure_unit' => 'ml'));
		ProductsWeight::create(array('title' => 'Teglica 212 ml', 'product_weight' => '212', 'measure_unit' => 'ml'));
		ProductsWeight::create(array('title' => 'Boca 1 L', 'product_weight' => '1', 'measure_unit' => 'l'));
		
		
		
		
	}
}

class MediaSeeder extends Seeder
{
	public function run()
	{
		
		Media::create(array('permalink' => '', 'image' => 'b137fdd1f79d56c.jpg'));
	}
}


class CategoriesSeeder extends Seeder
{
	public function run()
	{
		Category::create(array('title' => 'Ocat', 'permalink' => 'ocat', 'category_type' => 'product', 'description' => 'Kategorija proizvoda'));
		Category::create(array('title' => 'Ajvar', 'permalink' => 'ajvar', 'category_type' => 'product', 'description' => 'Kategorija proizvoda'));
	    Category::create(array('title' => 'Paradajz', 'permalink' => 'paradajz', 'category_type' => 'product', 'description' => 'Kategorija proizvoda'));
		Category::create(array('title' => 'Jabuka', 'permalink' => 'jabuka', 'category_type' => 'product', 'description' => 'Kategorija proizvoda'));
		Category::create(array('title' => 'Pekmez', 'permalink' => 'pekmez', 'category_type' => 'product', 'description' => 'Kategorija proizvoda'));
		Category::create(array('title' => 'Sok', 'permalink' => 'sok', 'category_type' => 'product', 'description' => 'Kategorija proizvoda'));
		Category::create(array('title' => 'Zaštita', 'permalink' => 'zastita', 'category_type' => 'blog', 'description' => ''));
		Category::create(array('title' => 'AKCIJA!', 'permalink' => 'akcija', 'category_type' => 'product', 'description' => 'U ovoj kategoriji će biti proizvodi koji su na akciji'));
		Category::create(array('title' => 'Orašasti plodovi', 'permalink' => 'orasasti-plodovi', 'category_type' => 'product', 'description' => 'Orasi i lješnjaci'));

	}
}

class ProductsSeeder extends Seeder
{

	public function run()
	{
		Products::create(array('title' => 'Gala Schnitzer Schniga', 'permalink' => 'gala-schnitzer-schniga-4kg', 'product_weight' => '2', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', 'price' => '30', 'manufacturing_price' => '6', 'onstock' => '0', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'cover_image' => 'placeholder_1920x500.jpg'));
		Products::create(array('title' => 'Top Red', 'permalink' => 'top-red-8kg', 'product_weight' => '1', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', 'price' => '50', 'manufacturing_price' => '16', 'onstock' => '0', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'cover_image' => 'placeholder_1920x500.jpg'));
		Products::create(array('title' => 'Fuji Kiku', 'permalink' => 'fuji-kiku-8kg', 'product_weight' => '1', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', 'price' => '50', 'manufacturing_price' => '16', 'onstock' => '0', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'cover_image' => 'placeholder_1920x500.jpg'));
		Products::create(array('title' => 'BiB 5L - Mutni', 'permalink' => 'bib-5l-mutni-sok-5l', 'product_weight' => '3', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', 'price' => '50', 'manufacturing_price' => '25', 'onstock' => '0', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'cover_image' => 'placeholder_1920x500.jpg'));
		Products::create(array('title' => 'BiB 5L - Bistri', 'permalink' => 'bib-5l-bistri-sok-5l', 'product_weight' => '3', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', 'price' => '50', 'manufacturing_price' => '25', 'onstock' => '0', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'cover_image' => 'placeholder_1920x500.jpg'));
		Products::create(array('title' => 'Gala Schnitzer Schniga', 'permalink' => 'gala-schnitzer-schniga-8kg', 'product_weight' => '1', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', 'price' => '50', 'manufacturing_price' => '16', 'onstock' => '0', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'cover_image' => 'placeholder_1920x500.jpg'));
		Products::create(array('title' => 'Fuji Kiku', 'permalink' => 'fuji-kiku-4kg', 'product_weight' => '2', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', 'price' => '30', 'manufacturing_price' => '6', 'onstock' => '0', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'cover_image' => 'placeholder_1920x500.jpg'));
		Products::create(array('title' => 'Top Red', 'permalink' => 'top-red-4kg', 'product_weight' => '2', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', 'price' => '30', 'manufacturing_price' => '6', 'onstock' => '0', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'cover_image' => 'placeholder_1920x500.jpg'));
		Products::create(array('title' => 'Prirodni jabučni ocat', 'permalink' => 'prirodni-jabucni-ocat', 'product_weight' => '1', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', 'price' => '25', 'manufacturing_price' => '12', 'onstock' => '0', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'cover_image' => 'placeholder_1920x500.jpg'));
		Products::create(array('title' => 'Pink Lady', 'permalink' => 'pink-lady-1kg', 'product_weight' => '1', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque tortor sed nisi suscipit lobortis.', 'price' => '65', 'manufacturing_price' => '35', 'onstock' => '1', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'cover_image' => 'placeholder_1920x500.jpg'));
		Products::create(array('title' => 'Orasi', 'permalink' => 'orasi', 'product_weight' => '8', 'description' => '<p>Domaći orasi, ručno oči&scaron;ćeni.</p>', 'price' => '50', 'manufacturing_price' => '25', 'onstock' => '1', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'cover_image' => 'placeholder_1920x500.jpg'));
		Products::create(array('title' => 'Lješnjaci', 'permalink' => 'ljesnjaci', 'product_weight' => '8', 'description' => '<p>Domaći i ručno či&scaron;ćeni lje&scaron;njaci.</p>', 'price' => '50', 'manufacturing_price' => '30', 'onstock' => '1', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'cover_image' => 'placeholder_1920x500.jpg'));
		Products::create(array('title' => 'Promo pekmez od jabuka DUO', 'permalink' => 'promo-pekmez-od-jabuka-duo', 'product_weight' => '5', 'description' => '<p>Dva prekrasna domaća pekmeza od jabuka. Svijetliji za svakodnevno kori&scaron;tenje, a tamniji je Božićno izdanje sa cimetom i dodanim mu&scaron;katnim ora&scaron;čićima.</p>', 'price' => '30', 'manufacturing_price' => '7', 'onstock' => '1', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'cover_image' => 'placeholder_1920x500.jpg'));
	}
}


class ProductPostsSeeder extends Seeder
{
	public function run()
	{
		ProductPosts::create(array('product_id' => '1', 'blog_id' => '1'));
		ProductPosts::create(array('product_id' => '1', 'blog_id' => '3'));
		ProductPosts::create(array('product_id' => '1', 'blog_id' => '5'));
		ProductPosts::create(array('product_id' => '2', 'blog_id' => '2'));
		ProductPosts::create(array('product_id' => '2', 'blog_id' => '3'));
		ProductPosts::create(array('product_id' => '3', 'blog_id' => '2'));
		ProductPosts::create(array('product_id' => '3', 'blog_id' => '3'));
		ProductPosts::create(array('product_id' => '3', 'blog_id' => '4'));
		ProductPosts::create(array('product_id' => '3', 'blog_id' => '5'));
		ProductPosts::create(array('product_id' => '4', 'blog_id' => '1'));
		
	}
}

class AreaSeeder extends Seeder
{

	public function run()
	{
		// ----------------- OSIJEK ---------------------- //
		Area::create(array('name' => 'Borova', 'permalink' => 'borova', 'city' => '83'));
		Area::create(array('name' => 'Centar', 'permalink' => 'centar', 'city' => '83'));
		Area::create(array('name' => 'Dionica', 'permalink' => 'dionica', 'city' => '83'));
		Area::create(array('name' => 'Donji Grad', 'permalink' => 'donji-grad', 'city' => '83'));
		Area::create(array('name' => 'Gornji Grad', 'permalink' => 'gornji-grad', 'city' => '83'));
		Area::create(array('name' => 'Industrijska četvrt', 'permalink' => 'industrijska-cetvrt', 'city' => '83'));
		Area::create(array('name' => 'Jug I', 'permalink' => 'jug-i', 'city' => '83'));
		Area::create(array('name' => 'Jug II', 'permalink' => 'jug-ii', 'city' => '83'));
		Area::create(array('name' => 'Našičko naselje', 'permalink' => 'nasicko-naselje', 'city' => '83'));
		Area::create(array('name' => 'Pampas', 'permalink' => 'pampas', 'city' => '83'));
		Area::create(array('name' => 'Pustara', 'permalink' => 'pustara', 'city' => '83'));
		Area::create(array('name' => 'Retfala', 'permalink' => 'retfala', 'city' => '83'));
		Area::create(array('name' => 'Sjenjak', 'permalink' => 'sjenjak', 'city' => '83'));
		Area::create(array('name' => 'Stadionsko naselje', 'permalink' => 'stadionsko-naselje', 'city' => '83'));
		Area::create(array('name' => 'Tvrđa', 'permalink' => 'tvrda', 'city' => '83'));
		Area::create(array('name' => 'Zapadno predgrađe', 'permalink' => 'zapadno-predgrade', 'city' => '83'));
		Area::create(array('name' => 'Zeleno polje', 'permalink' => 'zeleno-polje', 'city' => '83'));
		// ----------------- ZAGREB ---------------------- //
		Area::create(array('name' => 'Blato', 'permalink' => 'blato', 'city' => '1'));
		Area::create(array('name' => 'Borongaj', 'permalink' => 'borongaj', 'city' => '1'));
		Area::create(array('name' => 'Borovje', 'permalink' => 'borovje', 'city' => '1'));
		Area::create(array('name' => 'Botinec', 'permalink' => 'botinec', 'city' => '1'));
		Area::create(array('name' => 'Brestje', 'permalink' => 'brestje', 'city' => '1'));
		Area::create(array('name' => 'Brezovica', 'permalink' => 'brezovica', 'city' => '1'));
		Area::create(array('name' => 'Bukovac', 'permalink' => 'bukovac', 'city' => '1'));
		Area::create(array('name' => 'Buzin', 'permalink' => 'buzin', 'city' => '1'));
		Area::create(array('name' => 'Centar', 'permalink' => 'centar', 'city' => '1'));
		Area::create(array('name' => 'Črnomerec', 'permalink' => 'crnomerec', 'city' => '1'));
		Area::create(array('name' => 'Čulinec', 'permalink' => 'culinec', 'city' => '1'));
		Area::create(array('name' => 'Cvjetno naselje', 'permalink' => 'cvjetno-naselje', 'city' => '1'));
		Area::create(array('name' => 'Dubec', 'permalink' => 'dubec', 'city' => '1'));
		Area::create(array('name' => 'Dubrava', 'permalink' => 'dubrava', 'city' => '1'));
		Area::create(array('name' => 'Dugave', 'permalink' => 'dugave', 'city' => '1'));
		Area::create(array('name' => 'Ferenščica', 'permalink' => 'ferenscica', 'city' => '1'));
		Area::create(array('name' => 'Folnegovićevo', 'permalink' => 'folnegovicevo', 'city' => '1'));
		Area::create(array('name' => 'Gajnice', 'permalink' => 'gajnice', 'city' => '1'));
		Area::create(array('name' => 'Gračani', 'permalink' => 'gracani', 'city' => '1'));
		Area::create(array('name' => 'Ivanja Reka', 'permalink' => 'ivanja-reka', 'city' => '1'));
		Area::create(array('name' => 'Jakuševec', 'permalink' => 'jakusevec', 'city' => '1'));
		Area::create(array('name' => 'Jankomir', 'permalink' => 'jankomir', 'city' => '1'));
		Area::create(array('name' => 'Jarun', 'permalink' => 'jarun', 'city' => '1'));
		Area::create(array('name' => 'Kajzerica', 'permalink' => 'kajzerica', 'city' => '1'));
		Area::create(array('name' => 'Kanal', 'permalink' => 'kanal', 'city' => '1'));
		Area::create(array('name' => 'Klara', 'permalink' => 'klara', 'city' => '1'));
		Area::create(array('name' => 'Knežija', 'permalink' => 'knezija', 'city' => '1'));
		Area::create(array('name' => 'Kruge', 'permalink' => 'kruge', 'city' => '1'));
		Area::create(array('name' => 'Ksaver', 'permalink' => 'ksaver', 'city' => '1'));
		Area::create(array('name' => 'Kustošija', 'permalink' => 'kustosija', 'city' => '1'));
		Area::create(array('name' => 'Kvatrić', 'permalink' => 'kvatric', 'city' => '1'));
		Area::create(array('name' => 'Lanište', 'permalink' => 'laniste', 'city' => '1'));
		Area::create(array('name' => 'Lučko', 'permalink' => 'lucko', 'city' => '1'));
		Area::create(array('name' => 'Ljubljanica', 'permalink' => 'ljubljanica', 'city' => '1'));
		Area::create(array('name' => 'Maksimir', 'permalink' => 'maksimir', 'city' => '1'));
		Area::create(array('name' => 'Malešnica', 'permalink' => 'malesnica', 'city' => '1'));
		Area::create(array('name' => 'Markuševec', 'permalink' => 'markusevec', 'city' => '1'));
		Area::create(array('name' => 'Medveščak', 'permalink' => 'medvescak', 'city' => '1'));
		Area::create(array('name' => 'Mikulići', 'permalink' => 'mikulici', 'city' => '1'));
		Area::create(array('name' => 'Mlinovi', 'permalink' => 'mlinovi', 'city' => '1'));
		Area::create(array('name' => 'Peščenica', 'permalink' => 'pescenica', 'city' => '1'));
		Area::create(array('name' => 'Podsused', 'permalink' => 'podsused', 'city' => '1'));
		Area::create(array('name' => 'Poljanice', 'permalink' => 'poljanice', 'city' => '1'));
		Area::create(array('name' => 'Prečko', 'permalink' => 'precko', 'city' => '1'));
		Area::create(array('name' => 'Ravnice', 'permalink' => 'ravnice', 'city' => '1'));
		Area::create(array('name' => 'Remete', 'permalink' => 'remete', 'city' => '1'));
		Area::create(array('name' => 'Remetinec', 'permalink' => 'remetinec', 'city' => '1'));
		Area::create(array('name' => 'Retkovec', 'permalink' => 'retkovec', 'city' => '1'));
		Area::create(array('name' => 'Rudeš', 'permalink' => 'rudes', 'city' => '1'));
		Area::create(array('name' => 'Savica', 'permalink' => 'savica', 'city' => '1'));
		Area::create(array('name' => 'Savski gaj', 'permalink' => 'savski-gaj', 'city' => '1'));
		Area::create(array('name' => 'Šestine', 'permalink' => 'sestine', 'city' => '1'));
		Area::create(array('name' => 'Sesvete', 'permalink' => 'sesvete', 'city' => '1'));
		Area::create(array('name' => 'Sigečica', 'permalink' => 'sigecica', 'city' => '1'));
		Area::create(array('name' => 'Siget', 'permalink' => 'siget', 'city' => '1'));
		Area::create(array('name' => 'Sloboština', 'permalink' => 'slobostina', 'city' => '1'));
		Area::create(array('name' => 'Sopot', 'permalink' => 'sopot', 'city' => '1'));
		Area::create(array('name' => 'Špansko', 'permalink' => 'spansko', 'city' => '1'));
		Area::create(array('name' => 'Središće', 'permalink' => 'sredisce', 'city' => '1'));
		Area::create(array('name' => 'Srednjaci', 'permalink' => 'srednjaci', 'city' => '1'));
		Area::create(array('name' => 'Stenjevec', 'permalink' => 'stenjevec', 'city' => '1'));
		Area::create(array('name' => 'Stupnik', 'permalink' => 'stupnik', 'city' => '1'));
		Area::create(array('name' => 'Sveta Nedelja', 'permalink' => 'sveta-nedelja', 'city' => '1'));
		Area::create(array('name' => 'Svetice', 'permalink' => 'svetice', 'city' => '1'));
		Area::create(array('name' => 'Travno', 'permalink' => 'travno', 'city' => '1'));
		Area::create(array('name' => 'Trešnjevka', 'permalink' => 'tresnjevka', 'city' => '1'));
		Area::create(array('name' => 'Trnava', 'permalink' => 'trnava', 'city' => '1'));
		Area::create(array('name' => 'Trnovčica', 'permalink' => 'trnovcica', 'city' => '1'));
		Area::create(array('name' => 'Trnsko', 'permalink' => 'trnsko', 'city' => '1'));
		Area::create(array('name' => 'Trnje', 'permalink' => 'trnje', 'city' => '1'));
		Area::create(array('name' => 'Trokut', 'permalink' => 'trokut', 'city' => '1'));
		Area::create(array('name' => 'Utrina', 'permalink' => 'utrina', 'city' => '1'));
		Area::create(array('name' => 'Veliko Polje', 'permalink' => 'veliko-polje', 'city' => '1'));
		Area::create(array('name' => 'Volovčica', 'permalink' => 'volovcica', 'city' => '1'));
		Area::create(array('name' => 'Voltino', 'permalink' => 'voltino', 'city' => '1'));
		Area::create(array('name' => 'Vrapče', 'permalink' => 'vrapce', 'city' => '1'));
		Area::create(array('name' => 'Vrbani', 'permalink' => 'vrbani', 'city' => '1'));
		Area::create(array('name' => 'Vrbik', 'permalink' => 'vrbik', 'city' => '1'));
		Area::create(array('name' => 'Vukomerec', 'permalink' => 'vukomerec', 'city' => '1'));
		Area::create(array('name' => 'Zapruđe', 'permalink' => 'zaprude', 'city' => '1'));
		Area::create(array('name' => 'Zavrtnica', 'permalink' => 'zavrtnica', 'city' => '1'));
		Area::create(array('name' => 'Žitnjak', 'permalink' => 'zitnjak', 'city' => '1'));
		// ----------------- SPLIT ---------------------- //
		Area::create(array('name' => 'Bačvice', 'permalink' => 'bacvice', 'city' => '103'));
		Area::create(array('name' => 'Bilice', 'permalink' => 'bilice', 'city' => '103'));
		Area::create(array('name' => 'Blatine', 'permalink' => 'blatine', 'city' => '103'));
		Area::create(array('name' => 'Bol', 'permalink' => 'bol', 'city' => '103'));
		Area::create(array('name' => 'Brda', 'permalink' => 'brda', 'city' => '103'));
		Area::create(array('name' => 'Dobri', 'permalink' => 'dobri', 'city' => '103'));
		Area::create(array('name' => 'Dračevac', 'permalink' => 'dracevac', 'city' => '103'));
		Area::create(array('name' => 'Dragovode', 'permalink' => 'dragovode', 'city' => '103'));
		Area::create(array('name' => 'Dujilovo', 'permalink' => 'dujilovo', 'city' => '103'));
		Area::create(array('name' => 'Dujmovača', 'permalink' => 'dujmovaca', 'city' => '103'));
		Area::create(array('name' => 'Firule', 'permalink' => 'firule', 'city' => '103'));
		Area::create(array('name' => 'Glavičine', 'permalink' => 'glavicine', 'city' => '103'));
		Area::create(array('name' => 'Grad', 'permalink' => 'grad', 'city' => '103'));
		Area::create(array('name' => 'Gripe', 'permalink' => 'gripe', 'city' => '103'));
		Area::create(array('name' => 'Kacunar', 'permalink' => 'kacunar', 'city' => '103'));
		Area::create(array('name' => 'Kila', 'permalink' => 'kila', 'city' => '103'));
		Area::create(array('name' => 'Kman', 'permalink' => 'kman', 'city' => '103'));
		Area::create(array('name' => 'Kopilica', 'permalink' => 'kopilica', 'city' => '103'));
		Area::create(array('name' => 'Križine', 'permalink' => 'krizine', 'city' => '103'));
		Area::create(array('name' => 'Lokve', 'permalink' => 'lokve', 'city' => '103'));
		Area::create(array('name' => 'Lora', 'permalink' => 'lora', 'city' => '103'));
		Area::create(array('name' => 'Lovret', 'permalink' => 'lovret', 'city' => '103'));
		Area::create(array('name' => 'Lovrinac', 'permalink' => 'lovrinac', 'city' => '103'));
		Area::create(array('name' => 'Lučac', 'permalink' => 'lucac', 'city' => '103'));
		Area::create(array('name' => 'Manuš', 'permalink' => 'manus', 'city' => '103'));
		Area::create(array('name' => 'Mejaši', 'permalink' => 'mejasi', 'city' => '103'));
		Area::create(array('name' => 'Meje', 'permalink' => 'meje', 'city' => '103'));
		Area::create(array('name' => 'Mertojak', 'permalink' => 'mertojak', 'city' => '103'));
		Area::create(array('name' => 'Neslanovac', 'permalink' => 'neslanovac', 'city' => '103'));
		Area::create(array('name' => 'Pazdigrad', 'permalink' => 'pazdigrad', 'city' => '103'));
		Area::create(array('name' => 'Plokite', 'permalink' => 'plokite', 'city' => '103'));
		Area::create(array('name' => 'Poljud', 'permalink' => 'poljud', 'city' => '103'));
		Area::create(array('name' => 'Pujanke', 'permalink' => 'pujanke', 'city' => '103'));
		Area::create(array('name' => 'Radunica', 'permalink' => 'radunica', 'city' => '103'));
		Area::create(array('name' => 'Ravne njive', 'permalink' => 'ravne-njive', 'city' => '103'));
		Area::create(array('name' => 'Sirobuja', 'permalink' => 'sirobuja', 'city' => '103'));
		Area::create(array('name' => 'Skalice', 'permalink' => 'skalice', 'city' => '103'));
		Area::create(array('name' => 'Škrape', 'permalink' => 'skrape', 'city' => '103'));
		Area::create(array('name' => 'Smokovik', 'permalink' => 'smokovik', 'city' => '103'));
		Area::create(array('name' => 'Smrdečac', 'permalink' => 'smrdecac', 'city' => '103'));
		Area::create(array('name' => 'Spinut', 'permalink' => 'spinut', 'city' => '103'));
		Area::create(array('name' => 'Stinice', 'permalink' => 'stinice', 'city' => '103'));
		Area::create(array('name' => 'Sućidar', 'permalink' => 'sucidar', 'city' => '103'));
		Area::create(array('name' => 'Sukojišan', 'permalink' => 'sukojisan', 'city' => '103'));
		Area::create(array('name' => 'Sustipan', 'permalink' => 'sustipan', 'city' => '103'));
		Area::create(array('name' => 'Table', 'permalink' => 'table', 'city' => '103'));
		Area::create(array('name' => 'Trstenik', 'permalink' => 'trstenik', 'city' => '103'));
		Area::create(array('name' => 'Veli Varoš', 'permalink' => 'veli-varos', 'city' => '103'));
		Area::create(array('name' => 'Visoka', 'permalink' => 'visoka', 'city' => '103'));
		Area::create(array('name' => 'Vranjic', 'permalink' => 'vranjic', 'city' => '103'));
		Area::create(array('name' => 'Žnjan', 'permalink' => 'znjan', 'city' => '103'));
		Area::create(array('name' => 'Zvončac', 'permalink' => 'zvoncac', 'city' => '103'));
		// ----------------- RIJEKA ---------------------- //
		Area::create(array('name' => 'Banderovo', 'permalink' => 'banderovo', 'city' => '56'));
		Area::create(array('name' => 'Belveder', 'permalink' => 'belveder', 'city' => '56'));
		Area::create(array('name' => 'Bivio', 'permalink' => 'bivio', 'city' => '56'));
		Area::create(array('name' => 'Brajda', 'permalink' => 'brajda', 'city' => '56'));
		Area::create(array('name' => 'Brašćine', 'permalink' => 'brascine', 'city' => '56'));
		Area::create(array('name' => 'Bulevard', 'permalink' => 'bulevard', 'city' => '56'));
		Area::create(array('name' => 'Centar', 'permalink' => 'centar', 'city' => '56'));
		Area::create(array('name' => 'Donja Drenova', 'permalink' => 'donja-drenova', 'city' => '56'));
		Area::create(array('name' => 'Gornja Drenova', 'permalink' => 'gornja-drenova', 'city' => '56'));
		Area::create(array('name' => 'Gornja Vežica', 'permalink' => 'gornja-vezica', 'city' => '56'));
		Area::create(array('name' => 'Grbci', 'permalink' => 'grbci', 'city' => '56'));
		Area::create(array('name' => 'Grobnik', 'permalink' => 'grobnik', 'city' => '56'));
		Area::create(array('name' => 'Kantrida', 'permalink' => 'kantrida', 'city' => '56'));
		Area::create(array('name' => 'Kastav', 'permalink' => 'kastav', 'city' => '56'));
		Area::create(array('name' => 'Kostrena', 'permalink' => 'kostrena', 'city' => '56'));
		Area::create(array('name' => 'Kozala', 'permalink' => 'kozala', 'city' => '56'));
		Area::create(array('name' => 'Krimeja', 'permalink' => 'krimeja', 'city' => '56'));
		Area::create(array('name' => 'Krnjevo', 'permalink' => 'krnjevo', 'city' => '56'));
		Area::create(array('name' => 'Martinkovac', 'permalink' => 'martinkovac', 'city' => '56'));
		Area::create(array('name' => 'Matulji', 'permalink' => 'matulji', 'city' => '56'));
		Area::create(array('name' => 'Mlaka', 'permalink' => 'mlaka', 'city' => '56'));
		Area::create(array('name' => 'Orehovica', 'permalink' => 'orehovica', 'city' => '56'));
		Area::create(array('name' => 'Pašac', 'permalink' => 'pasac', 'city' => '56'));
		Area::create(array('name' => 'Pećine', 'permalink' => 'pecine', 'city' => '56'));
		Area::create(array('name' => 'Pehlin', 'permalink' => 'pehlin', 'city' => '56'));
		Area::create(array('name' => 'Podmurvice', 'permalink' => 'podmurvice', 'city' => '56'));
		Area::create(array('name' => 'Podvežica', 'permalink' => 'podvezica', 'city' => '56'));
		Area::create(array('name' => 'Potok', 'permalink' => 'potok', 'city' => '56'));
		Area::create(array('name' => 'Pulac', 'permalink' => 'pulac', 'city' => '56'));
		Area::create(array('name' => 'Rastočine', 'permalink' => 'rastocine', 'city' => '56'));
		Area::create(array('name' => 'Rujevica', 'permalink' => 'rujevica', 'city' => '56'));
		Area::create(array('name' => 'Školjić', 'permalink' => 'skoljic', 'city' => '56'));
		Area::create(array('name' => 'Škurinje', 'permalink' => 'skurinje', 'city' => '56'));
		Area::create(array('name' => 'Škurinjska Draga', 'permalink' => 'skurinjska-draga', 'city' => '56'));
		Area::create(array('name' => 'Srdoči', 'permalink' => 'srdoci', 'city' => '56'));
		Area::create(array('name' => 'Sušačka Draga', 'permalink' => 'susacka-draga', 'city' => '56'));
		Area::create(array('name' => 'Sušak', 'permalink' => 'susak', 'city' => '56'));
		Area::create(array('name' => 'Sv. Kuzam', 'permalink' => 'sv.-kuzam', 'city' => '56'));
		Area::create(array('name' => 'Trsat', 'permalink' => 'trsat', 'city' => '56'));
		Area::create(array('name' => 'Turnić', 'permalink' => 'turnic', 'city' => '56'));
		Area::create(array('name' => 'Viškovo', 'permalink' => 'viskovo', 'city' => '56'));
		Area::create(array('name' => 'Vojak', 'permalink' => 'vojak', 'city' => '56'));
		Area::create(array('name' => 'Zamet', 'permalink' => 'zamet', 'city' => '56'));
		// ----------------- ZADAR ---------------------- //
		Area::create(array('name' => 'Arbanasi', 'permalink' => 'arbanasi', 'city' => '77'));
		Area::create(array('name' => 'Belafuža', 'permalink' => 'belafuza', 'city' => '77'));
		Area::create(array('name' => 'Bili Brig', 'permalink' => 'bili-brig', 'city' => '77'));
		Area::create(array('name' => 'Brodarica', 'permalink' => 'brodarica', 'city' => '77'));
		Area::create(array('name' => 'Crvene Kuće', 'permalink' => 'crvene-kuce', 'city' => '77'));
		Area::create(array('name' => 'Diklo', 'permalink' => 'diklo', 'city' => '77'));
		Area::create(array('name' => 'Donji Brig', 'permalink' => 'donji-brig', 'city' => '77'));
		Area::create(array('name' => 'Dražanica', 'permalink' => 'drazanica', 'city' => '77'));
		Area::create(array('name' => 'Dražnice', 'permalink' => 'draznice', 'city' => '77'));
		Area::create(array('name' => 'Gaj', 'permalink' => 'gaj', 'city' => '77'));
		Area::create(array('name' => 'Gaženica', 'permalink' => 'gazenica', 'city' => '77'));
		Area::create(array('name' => 'Gornji Bilig', 'permalink' => 'gornji-bilig', 'city' => '77'));
		Area::create(array('name' => 'Jazine 1', 'permalink' => 'jazine-1', 'city' => '77'));
		Area::create(array('name' => 'Jazine 2', 'permalink' => 'jazine-2', 'city' => '77'));
		Area::create(array('name' => 'Kolovare', 'permalink' => 'kolovare', 'city' => '77'));
		Area::create(array('name' => 'Martinovo', 'permalink' => 'martinovo', 'city' => '77'));
		Area::create(array('name' => 'Maslina', 'permalink' => 'maslina', 'city' => '77'));
		Area::create(array('name' => 'Mocire', 'permalink' => 'mocire', 'city' => '77'));
		Area::create(array('name' => 'Novi Bokanjac', 'permalink' => 'novi-bokanjac', 'city' => '77'));
		Area::create(array('name' => 'Petrić', 'permalink' => 'petric', 'city' => '77'));
		Area::create(array('name' => 'Plovanija', 'permalink' => 'plovanija', 'city' => '77'));
		Area::create(array('name' => 'Poluotok', 'permalink' => 'poluotok', 'city' => '77'));
		Area::create(array('name' => 'Puntamika', 'permalink' => 'puntamika', 'city' => '77'));
		Area::create(array('name' => 'Ravnice', 'permalink' => 'ravnice', 'city' => '77'));
		Area::create(array('name' => 'Ričina', 'permalink' => 'ricina', 'city' => '77'));
		Area::create(array('name' => 'Sinjoretovo', 'permalink' => 'sinjoretovo', 'city' => '77'));
		Area::create(array('name' => 'Skročini', 'permalink' => 'skrocini', 'city' => '77'));
		Area::create(array('name' => 'Smiljevac', 'permalink' => 'smiljevac', 'city' => '77'));
		Area::create(array('name' => 'Špada', 'permalink' => 'spada', 'city' => '77'));
		Area::create(array('name' => 'Stanovi', 'permalink' => 'stanovi', 'city' => '77'));
		Area::create(array('name' => 'Stari Bokanjac', 'permalink' => 'stari-bokanjac', 'city' => '77'));
		Area::create(array('name' => 'Višnjik', 'permalink' => 'visnjik', 'city' => '77'));
		Area::create(array('name' => 'Voštarnica', 'permalink' => 'vostarnica', 'city' => '77'));
		// ----------------- VELIKA GORICA ---------------------- //
		Area::create(array('name' => 'Čiče', 'permalink' => 'cice', 'city' => '8'));
		Area::create(array('name' => 'Mraclin', 'permalink' => 'mraclin', 'city' => '8'));
		Area::create(array('name' => 'Šćitarjevo', 'permalink' => 'scitarjevo', 'city' => '8'));
		Area::create(array('name' => 'Velika Gorica', 'permalink' => 'velika-gorica', 'city' => '8'));
		Area::create(array('name' => 'Velika Kosnica', 'permalink' => 'velika-kosnica', 'city' => '8'));
		Area::create(array('name' => 'Velika Mlaka', 'permalink' => 'velika-mlaka', 'city' => '8'));
		Area::create(array('name' => 'Vukomerić', 'permalink' => 'vukomeric', 'city' => '8'));
		// ----------------- VARAŽDIN ---------------------- //
		Area::create(array('name' => 'Ivanec', 'permalink' => 'ivanec', 'city' => '34'));
		Area::create(array('name' => 'Ludbreg', 'permalink' => 'ludbreg', 'city' => '34'));
		Area::create(array('name' => 'Novi Marof', 'permalink' => 'novi-marof', 'city' => '34'));
		Area::create(array('name' => 'Varaždin', 'permalink' => 'varazdin', 'city' => '34'));
		Area::create(array('name' => 'Varaždinske toplice', 'permalink' => 'varazdinske-toplice', 'city' => '34'));
	}
}

class CitySeeder extends Seeder
{
	public function run()
	{
		City::create(array('permalink' => 'zagreb', 'zip' => '10000','name' => 'Zagreb'));
		City::create(array('permalink' => 'dugo-selo', 'name' => 'Dugo Selo'));
		City::create(array('permalink' => 'ivanic-grad', 'name' => 'Ivanić Grad'));
		City::create(array('permalink' => 'jastrebarsko', 'name' => 'Jastrebarsko'));
		City::create(array('permalink' => 'samobor', 'name' => 'Samobor'));
		City::create(array('permalink' => 'sveta-nedelja', 'name' => 'Sveta Nedelja'));
		City::create(array('permalink' => 'sveti-ivan-zelina', 'name' => 'Sveti Ivan Zelina'));
		City::create(array('permalink' => 'velika-gorica', 'name' => 'Velika Gorica'));
		City::create(array('permalink' => 'vrbovec', 'name' => 'Vrbovec'));
		City::create(array('permalink' => 'zapresic', 'name' => 'Zaprešić'));
		City::create(array('permalink' => 'donja-stubica', 'name' => 'Donja Stubica'));
		City::create(array('permalink' => 'klanjec', 'name' => 'Klanjec'));
		City::create(array('permalink' => 'krapina', 'name' => 'Krapina'));
		City::create(array('permalink' => 'oroslavje', 'name' => 'Oroslavje'));
		City::create(array('permalink' => 'pregrada', 'name' => 'Pregrada'));
		City::create(array('permalink' => 'zabok', 'name' => 'Zabok'));
		City::create(array('permalink' => 'zlatar', 'name' => 'Zlatar'));
		City::create(array('permalink' => 'glina', 'name' => 'Glina'));
		City::create(array('permalink' => 'hrvatska-kostajnica', 'name' => 'Hrvatska Kostajnica'));
		City::create(array('permalink' => 'kutina', 'name' => 'Kutina'));
		City::create(array('permalink' => 'novska', 'name' => 'Novska'));
		City::create(array('permalink' => 'petrinja', 'name' => 'Petrinja'));
		City::create(array('permalink' => 'popovaca', 'name' => 'Popovača'));
		City::create(array('permalink' => 'sisak', 'name' => 'Sisak'));
		City::create(array('permalink' => 'duga-resa', 'name' => 'Duga Resa'));
		City::create(array('permalink' => 'karlovac', 'name' => 'Karlovac'));
		City::create(array('permalink' => 'ogulin', 'name' => 'Ogulin'));
		City::create(array('permalink' => 'ozalj', 'name' => 'Ozalj'));
		City::create(array('permalink' => 'slunj', 'name' => 'Slunj'));
		City::create(array('permalink' => 'ivanec', 'name' => 'Ivanec'));
		City::create(array('permalink' => 'lepoglava', 'name' => 'Lepoglava'));
		City::create(array('permalink' => 'ludbreg', 'name' => 'Ludbreg'));
		City::create(array('permalink' => 'novi-marof', 'name' => 'Novi Marof'));
		City::create(array('permalink' => 'varazdin', 'name' => 'Varaždin'));
		City::create(array('permalink' => 'varazdinske-toplice', 'name' => 'Varaždinske Toplice'));
		City::create(array('permalink' => 'durdevac', 'name' => 'Đurđevac'));
		City::create(array('permalink' => 'koprivnica', 'name' => 'Koprivnica'));
		City::create(array('permalink' => 'krizevci', 'name' => 'Križevci'));
		City::create(array('permalink' => 'bjelovar', 'name' => 'Bjelovar'));
		City::create(array('permalink' => 'cazma', 'name' => 'Čazma'));
		City::create(array('permalink' => 'daruvar', 'name' => 'Daruvar'));
		City::create(array('permalink' => 'garesnica', 'name' => 'Garešnica'));
		City::create(array('permalink' => 'grubisno-polje', 'name' => 'Grubišno Polje'));
		City::create(array('permalink' => 'bakar', 'name' => 'Bakar'));
		City::create(array('permalink' => 'cres', 'name' => 'Cres'));
		City::create(array('permalink' => 'crikvenica', 'name' => 'Crikvenica'));
		City::create(array('permalink' => 'cabar', 'name' => 'Čabar'));
		City::create(array('permalink' => 'delnice', 'name' => 'Delnice'));
		City::create(array('permalink' => 'kastav', 'name' => 'Kastav'));
		City::create(array('permalink' => 'kraljevica', 'name' => 'Kraljevica'));
		City::create(array('permalink' => 'krk', 'name' => 'Krk'));
		City::create(array('permalink' => 'mali-losinj', 'name' => 'Mali Lošinj'));
		City::create(array('permalink' => 'novi-vinodolski', 'name' => 'Novi Vinodolski'));
		City::create(array('permalink' => 'opatija', 'name' => 'Opatija'));
		City::create(array('permalink' => 'rab', 'name' => 'Rab'));
		City::create(array('permalink' => 'rijeka', 'name' => 'Rijeka'));
		City::create(array('permalink' => 'vrbovsko', 'name' => 'Vrbovsko'));
		City::create(array('permalink' => 'gospic', 'name' => 'Gospić'));
		City::create(array('permalink' => 'novalja', 'name' => 'Novalja'));
		City::create(array('permalink' => 'otocac', 'name' => 'Otočac'));
		City::create(array('permalink' => 'senj', 'name' => 'Senj'));
		City::create(array('permalink' => 'orahovica', 'name' => 'Orahovica'));
		City::create(array('permalink' => 'slatina', 'name' => 'Slatina'));
		City::create(array('permalink' => 'virovitica', 'name' => 'Virovitica'));
		City::create(array('permalink' => 'kutjevo', 'name' => 'Kutjevo'));
		City::create(array('permalink' => 'lipik', 'name' => 'Lipik'));
		City::create(array('permalink' => 'pakrac', 'name' => 'Pakrac'));
		City::create(array('permalink' => 'pleternica', 'name' => 'Pleternica'));
		City::create(array('permalink' => 'pozega', 'name' => 'Požega'));
		City::create(array('permalink' => 'nova-gradiska', 'name' => 'Nova gradiška'));
		City::create(array('permalink' => 'slavonski-brod', 'name' => 'Slavonski Brod'));
		City::create(array('permalink' => 'benkovac', 'name' => 'Benkovac'));
		City::create(array('permalink' => 'biograd-na-moru', 'name' => 'Biograd na Moru'));
		City::create(array('permalink' => 'nin', 'name' => 'Nin'));
		City::create(array('permalink' => 'obrovac', 'name' => 'Obrovac'));
		City::create(array('permalink' => 'pag', 'name' => 'Pag'));
		City::create(array('permalink' => 'zadar', 'name' => 'Zadar'));
		City::create(array('permalink' => 'beli-manastir', 'name' => 'Beli Manastir'));
		City::create(array('permalink' => 'belisce', 'name' => 'Belišće'));
		City::create(array('permalink' => 'donji-miholjac', 'name' => 'Donji Miholjac'));
		City::create(array('permalink' => 'dakovo', 'name' => 'Đakovo'));
		City::create(array('permalink' => 'nasice', 'name' => 'Našice'));
		City::create(array('permalink' => 'osijek', 'zip' => '31000','name' => 'Osijek'));
		City::create(array('permalink' => 'valpovo', 'name' => 'Valpovo'));
		City::create(array('permalink' => 'drnis', 'name' => 'Drniš'));
		City::create(array('permalink' => 'knin', 'name' => 'Knin'));
		City::create(array('permalink' => 'skradin', 'name' => 'Skradin'));
		City::create(array('permalink' => 'sibenik', 'name' => 'Šibenik'));
		City::create(array('permalink' => 'vodice', 'name' => 'Vodice'));
		City::create(array('permalink' => 'ilok', 'name' => 'Ilok'));
		City::create(array('permalink' => 'otok', 'name' => 'Otok'));
		City::create(array('permalink' => 'vinkovci', 'name' => 'Vinkovci'));
		City::create(array('permalink' => 'vukovar', 'name' => 'Vukovar'));
		City::create(array('permalink' => 'zupanja', 'name' => 'Županja'));
		City::create(array('permalink' => 'hvar', 'name' => 'Hvar'));
		City::create(array('permalink' => 'imotski', 'name' => 'Imotski'));
		City::create(array('permalink' => 'kastela', 'name' => 'Kaštela'));
		City::create(array('permalink' => 'komiza', 'name' => 'Komiža'));
		City::create(array('permalink' => 'makarska', 'name' => 'Makarska'));
		City::create(array('permalink' => 'omis', 'name' => 'Omiš'));
		City::create(array('permalink' => 'sinj', 'name' => 'Sinj'));
		City::create(array('permalink' => 'solin', 'name' => 'Solin'));
		City::create(array('permalink' => 'split', 'name' => 'Split'));
		City::create(array('permalink' => 'stari-grad', 'name' => 'Stari Grad'));
		City::create(array('permalink' => 'supetar', 'name' => 'Supetar'));
		City::create(array('permalink' => 'trilj', 'name' => 'Trilj'));
		City::create(array('permalink' => 'trogir', 'name' => 'Trogir'));
		City::create(array('permalink' => 'vis', 'name' => 'Vis'));
		City::create(array('permalink' => 'vrgorac', 'name' => 'Vrgorac'));
		City::create(array('permalink' => 'vrlika', 'name' => 'Vrlika'));
		City::create(array('permalink' => 'buje-buie', 'name' => 'Buje-Buie'));
		City::create(array('permalink' => 'buzet', 'name' => 'Buzet'));
		City::create(array('permalink' => 'labin', 'name' => 'Labin'));
		City::create(array('permalink' => 'novigrad', 'name' => 'Novigrad'));
		City::create(array('permalink' => 'pazin', 'name' => 'Pazin'));
		City::create(array('permalink' => 'porec', 'name' => 'Poreč'));
		City::create(array('permalink' => 'pula', 'name' => 'Pula'));
		City::create(array('permalink' => 'rovinj', 'name' => 'Rovinj'));
		City::create(array('permalink' => 'umag', 'name' => 'Umag'));
		City::create(array('permalink' => 'vodnjan', 'name' => 'Vodnjan'));
		City::create(array('permalink' => 'dubrovnik', 'name' => 'Dubrovnik'));
		City::create(array('permalink' => 'korcula', 'name' => 'Korčula'));
		City::create(array('permalink' => 'metkovic', 'name' => 'Metković'));
		City::create(array('permalink' => 'opuzen', 'name' => 'Opuzen'));
		City::create(array('permalink' => 'ploce', 'name' => 'Ploče'));
		City::create(array('permalink' => 'cakovec', 'name' => 'Čakovec'));
		City::create(array('permalink' => 'mursko-sredisce', 'name' => 'Mursko Središće'));
		City::create(array('permalink' => 'prelog', 'name' => 'Prelog'));
	}
}

class UserSeeder extends Seeder
{
	public function run()
	{
		User::create(array('address' => 'Srijemska 53', 'phone' => '031 503 171', 'oib' => '', 'area' => '', 'first_name' => 'Dujo', 'last_name' => 'Plazibat', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Trg Slobode 8', 'phone' => '031212084', 'oib' => '', 'area' => '', 'first_name' => 'Marija', 'last_name' => 'Luksar', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Gundulićeva 128', 'phone' => '091 737 1664', 'oib' => '', 'area' => '', 'first_name' => 'Ivan', 'last_name' => 'Vajtner', 'email' => 'ktominac@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ilirska 25', 'phone' => '098420203', 'oib' => '', 'area' => '', 'first_name' => 'Juraj', 'last_name' => 'Arambašić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Š. Petefija 11', 'phone' => '098 229 878', 'oib' => '', 'area' => '', 'first_name' => 'Davor', 'last_name' => 'Alić', 'email' => 'davor.alic.os@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vladimira Nazora 6', 'phone' => '091/526-2616', 'oib' => '', 'area' => '', 'first_name' => 'Ksenija', 'last_name' => 'Lugarić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Huttlerova 20 b', 'phone' => '098 711 840', 'oib' => '', 'area' => '', 'first_name' => 'Dina', 'last_name' => 'Koprolčec', 'email' => 'dinaster5@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Trogirska 11', 'phone' => '099 271 7528', 'oib' => '', 'area' => '', 'first_name' => 'Dubravka', 'last_name' => 'Šipoš', 'email' => 'dubravka.sipos@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Huttlerova 33 b', 'phone' => '091 535 4432', 'oib' => '', 'area' => '', 'first_name' => 'Ana', 'last_name' => 'Klasiček', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dubrovačka 10a', 'phone' => '095 8026469', 'oib' => '', 'area' => '', 'first_name' => 'Antonija', 'last_name' => 'Kristek-Janković', 'email' => 'antonijakj@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Bogdanovačka 21', 'phone' => '091 551 9494', 'oib' => '', 'area' => '', 'first_name' => 'Danijela', 'last_name' => 'Žugec', 'email' => 'dnzugec@hotmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Mavrinci 24', 'phone' => '091 567 4729', 'oib' => '85314737523', 'area' => '', 'first_name' => 'Alen', 'last_name' => 'Linardic', 'email' => 'alen.linardic@hotmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Gunduliceva 23', 'phone' => '0917366140', 'oib' => '', 'area' => '', 'first_name' => 'Maja', 'last_name' => 'Rogulja', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Gundulićeva 5', 'phone' => '0913000606', 'oib' => '', 'area' => '', 'first_name' => 'Valent', 'last_name' => 'Turković', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kralja Petra Svačića 49', 'phone' => '0995904075', 'oib' => '', 'area' => '', 'first_name' => 'Saša', 'last_name' => 'Gvozdenović', 'email' => 'sasa.gvozdenovic@os.t-com.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sjenjak 49', 'phone' => '098 458 964', 'oib' => '', 'area' => '', 'first_name' => 'Ana', 'last_name' => 'Brzica', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Osječka 178', 'phone' => '095 199 9827', 'oib' => '', 'area' => '', 'first_name' => 'Dario', 'last_name' => 'Roguljić-Kompa', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vukovarska 42', 'phone' => '099 200 97 05', 'oib' => '', 'area' => '', 'first_name' => 'Darija', 'last_name' => 'Lukić', 'email' => 'lukicdarija@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'SV.ANE17', 'phone' => '098 263 868', 'oib' => '', 'area' => '', 'first_name' => 'ZORAN', 'last_name' => 'VASILJ', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ružina 15', 'phone' => '373-650', 'oib' => '', 'area' => '', 'first_name' => 'Josipa', 'last_name' => 'Božić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Trogirska 11', 'phone' => '099 5045 790', 'oib' => '', 'area' => '', 'first_name' => 'Dubravka', 'last_name' => 'Šipoš', 'email' => 'dubravka.sipos@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sjenjak 101', 'phone' => '0989647828', 'oib' => '', 'area' => '', 'first_name' => 'Katarina', 'last_name' => 'Koščević', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ilirska 95', 'phone' => '0981876971', 'oib' => '', 'area' => '', 'first_name' => 'Renata', 'last_name' => 'Rikert', 'email' => 'renata.rikert@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Marjanska 49', 'phone' => '091 460 8150', 'oib' => '', 'area' => '', 'first_name' => 'Jurbina', 'last_name' => 'Mama', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Prolaz Josipa Leovića 5', 'phone' => '099 927 3392', 'oib' => '', 'area' => '', 'first_name' => 'Ivana', 'last_name' => 'Frančić', 'email' => 'francicka88@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Mlinska 60', 'phone' => '098 200 121', 'oib' => '', 'area' => '', 'first_name' => 'Darko', 'last_name' => 'Boban', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Učka 8', 'phone' => '091 957 5836', 'oib' => '', 'area' => '', 'first_name' => 'Marin', 'last_name' => 'Bašurić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Gornjodravska obala 98', 'phone' => '091 542 6197', 'oib' => '', 'area' => '', 'first_name' => 'Josipa', 'last_name' => 'bogdan', 'email' => 'Josipabogdan2402@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Bračka 86', 'phone' => '098 338 385', 'oib' => '', 'area' => '', 'first_name' => 'Ivan', 'last_name' => 'Kovač', 'email' => 'ivkovac@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Put macela 21, Brač', 'phone' => '091 55 22 519', 'oib' => '97062221285', 'area' => '', 'first_name' => 'Darija', 'last_name' => 'Vrandečić', 'email' => 'darija_vrandecic@net.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Blatna 7 A', 'phone' => '099 406 76 46', 'oib' => '', 'area' => '', 'first_name' => 'Katalin', 'last_name' => 'Juricne-Varnai', 'email' => 'varnaika@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'OSJEČKA 48', 'phone' => '091 1790 242', 'oib' => '', 'area' => '', 'first_name' => 'RENATA', 'last_name' => 'HORVAT', 'email' => 'renata.horvat2@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vrh Martinšćice 43', 'phone' => '095 90 455 32', 'oib' => '99645754940', 'area' => '', 'first_name' => 'ivan', 'last_name' => 'brdar', 'email' => 'i.brdar@rpv.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kralja Petra Svačića 49', 'phone' => '0913036036', 'oib' => '', 'area' => '', 'first_name' => 'Saša', 'last_name' => 'Gvozdenović', 'email' => 'sasa.gvozdenovic@os.t-com.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dobra 34', 'phone' => '091 507 1234', 'oib' => '', 'area' => '', 'first_name' => 'andreja', 'last_name' => 'skugor', 'email' => 'a.j.skugor@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'ULICA JOHA 1', 'phone' => '099708 2267', 'oib' => '', 'area' => '', 'first_name' => 'NIKOLA', 'last_name' => 'ŠULJUG', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Učka 8', 'phone' => '091 957 5836', 'oib' => '', 'area' => '', 'first_name' => 'Marinko', 'last_name' => 'Bašurić', 'email' => 'marinko.basuric@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kestenova 12', 'phone' => '091 206 45 42', 'oib' => '', 'area' => '', 'first_name' => 'Andrija', 'last_name' => 'Vuković', 'email' => 'vukov777@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'J.J. Strossmayera 268', 'phone' => '091 560 4814', 'oib' => '', 'area' => '', 'first_name' => 'Dejan', 'last_name' => 'Labudović', 'email' => 'dlabudov@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dubrovačka 163', 'phone' => '098 376 087', 'oib' => '', 'area' => '', 'first_name' => 'Dario', 'last_name' => 'štimac', 'email' => 'dstimac@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Malin 30', 'phone' => '099 212 0012', 'oib' => '', 'area' => '', 'first_name' => 'Jabuka', 'last_name' => 'Lalić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Petefija 113', 'phone' => '091 574 4800', 'oib' => '', 'area' => '', 'first_name' => 'Esad', 'last_name' => 'Sejdić', 'email' => 'esenzio@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Gornjodravska 80', 'phone' => '091 177 7711', 'oib' => '', 'area' => '', 'first_name' => 'Damir', 'last_name' => 'Ambrus', 'email' => 'dambrus@lorijen.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kralja Petra Svačića 16', 'phone' => '099 696 1131', 'oib' => '', 'area' => '', 'first_name' => 'Daliborka', 'last_name' => 'Veber', 'email' => 'daciborka@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Psunjska 109', 'phone' => '091/569-88-66', 'oib' => '', 'area' => '', 'first_name' => 'Maja', 'last_name' => 'Marinić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Srijemska 67', 'phone' => '0989359805', 'oib' => '', 'area' => '', 'first_name' => 'Katarina', 'last_name' => 'Majačić', 'email' => 'katarina.majacic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'S.R.Njemačke 213', 'phone' => '099 809 64 50', 'oib' => '85159798092', 'area' => '', 'first_name' => 'Milan', 'last_name' => 'Subotić', 'email' => 'subotic.milan21@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'V.I.Mestrovica 23', 'phone' => '098 904 0151', 'oib' => '', 'area' => '', 'first_name' => 'Ivan', 'last_name' => 'Lozančić', 'email' => 'Ilozancic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sukošanska 211', 'phone' => '091 566 7799', 'oib' => '25560919566', 'area' => '', 'first_name' => 'Mirjana', 'last_name' => 'Krnjaja', 'email' => 'thatgspot@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vatroslava Lisinskog 23', 'phone' => '095 300 0232', 'oib' => '', 'area' => '', 'first_name' => 'Helena', 'last_name' => 'Frank', 'email' => 'istvan.medjesi@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Trpanjska 11', 'phone' => '031565031', 'oib' => '', 'area' => '', 'first_name' => 'Tina', 'last_name' => 'Javorović', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Bukovačka cesta 271', 'phone' => '099 373 4316', 'oib' => '50805566228', 'area' => '', 'first_name' => 'IIvan', 'last_name' => 'Gabrić', 'email' => 'ivan@gabric.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ive Čače 122', 'phone' => '098 169 4349', 'oib' => '77790243730', 'area' => '', 'first_name' => 'Lydia', 'last_name' => 'Bilan', 'email' => 'lidija.bilan@hi.t-com.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Županijska 9', 'phone' => '098 547 255', 'oib' => '', 'area' => '', 'first_name' => 'HNKmerketinga-i-prodaje)', 'last_name' => 'u-Osijeku-(Služba-merketinga-i-prodaje)', 'email' => 'propaganda@hnk-osijek.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kneza Trpimira 1a', 'phone' => '098 748 891', 'oib' => '', 'area' => '', 'first_name' => 'ivana', 'last_name' => 'hazenauer', 'email' => 'hazo.79@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'D.Cesarića 11a', 'phone' => '+385 98 9248 198', 'oib' => '', 'area' => '', 'first_name' => 'Marijan', 'last_name' => 'Kovač', 'email' => 'kovacarh@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vukovarska 89', 'phone' => '099 218 1512', 'oib' => '', 'area' => '', 'first_name' => 'Gabrijela', 'last_name' => 'Bertić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vukovarska 22', 'phone' => 'eqw', 'oib' => '', 'area' => '', 'first_name' => 'Donacije', 'last_name' => 'podjela-jabuka', 'email' => 'qwe', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Divaltova 58', 'phone' => '095-555-9918', 'oib' => '', 'area' => '', 'first_name' => 'sandra', 'last_name' => 'rajc', 'email' => 'ssklepic@net.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'B. Kašića 34', 'phone' => '098 506 265', 'oib' => '', 'area' => '', 'first_name' => 'Velimir', 'last_name' => 'Slovaček', 'email' => 'velimir.slovacek@odvjetnici.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'M. A. Reljkovića 1', 'phone' => '091 210 3210', 'oib' => '', 'area' => '', 'first_name' => 'Boris', 'last_name' => 'Peterka', 'email' => 'boris@studioat.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Europska Avenija 12', 'phone' => '091 510 1222', 'oib' => '', 'area' => '', 'first_name' => 'Sanda', 'last_name' => 'Ham', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'I. Gundulića 223', 'phone' => '091 891 2725', 'oib' => '', 'area' => '', 'first_name' => 'Frano', 'last_name' => 'Pešut', 'email' => 'frano.pesut@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sjenjak 137', 'phone' => '031 573 050', 'oib' => '', 'area' => '', 'first_name' => 'Snježana', 'last_name' => 'Žiža', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sv.L.B. Mandića bb', 'phone' => '091 569 0544', 'oib' => '', 'area' => '', 'first_name' => 'Vedran', 'last_name' => 'Kurbalić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'G. Trombe bb', 'phone' => '098 931 1879', 'oib' => '', 'area' => '', 'first_name' => 'Majda', 'last_name' => 'Ukosić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Medulinska 5A', 'phone' => '098 93 44 308', 'oib' => '', 'area' => '', 'first_name' => 'Sanja', 'last_name' => 'Dogan', 'email' => 'sanja.dogan@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'I. Zajca 13', 'phone' => '091 600 6319', 'oib' => '', 'area' => '', 'first_name' => 'Drago', 'last_name' => 'Kohn', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'I. Zajca 9', 'phone' => '099 251 5444', 'oib' => '', 'area' => '', 'first_name' => 'Katica', 'last_name' => 'Mrkonjić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Reisnerova 113', 'phone' => '098 927 5198', 'oib' => '', 'area' => '', 'first_name' => 'Lidija', 'last_name' => 'Prlić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Bračka 140', 'phone' => '091 588 1508', 'oib' => '', 'area' => '', 'first_name' => 'Ana', 'last_name' => 'Martinović', 'email' => 'martinovic.ana.os@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vlašićka 19', 'phone' => '091 913 6567', 'oib' => '', 'area' => '', 'first_name' => 'Marija', 'last_name' => 'Karačić', 'email' => 'kimcommerce1@net.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Županijska 1', 'phone' => '0989795132', 'oib' => '', 'area' => '', 'first_name' => 'Mirjana', 'last_name' => 'Ferenčak', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'B. Radičevića 14', 'phone' => '098372700', 'oib' => '', 'area' => '', 'first_name' => 'Katarina', 'last_name' => 'Bošnjak', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sljemenska 62', 'phone' => '098 185 3751', 'oib' => '', 'area' => '', 'first_name' => 'Tihana', 'last_name' => 'Petrović', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Bihaćka 1d', 'phone' => '091 762 6137', 'oib' => '', 'area' => '', 'first_name' => 'Denis', 'last_name' => 'Sušac', 'email' => 'denis@mono.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Našička 31a', 'phone' => '099 225 5255', 'oib' => '', 'area' => '', 'first_name' => 'Eduard', 'last_name' => 'Kuzma', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vij. V. Bukovca 10', 'phone' => '098 925 2567', 'oib' => '', 'area' => '', 'first_name' => 'Sanja', 'last_name' => 'Klarić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Joha 1', 'phone' => '099 708 2267', 'oib' => '', 'area' => '', 'first_name' => 'Nikola', 'last_name' => 'Šuljug', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Gundulićeva 103', 'phone' => '095 863 9018', 'oib' => '', 'area' => '', 'first_name' => 'Maja', 'last_name' => 'Diklić', 'email' => 'majadiklic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Zvečevska 26', 'phone' => '098 547 255', 'oib' => '', 'area' => '', 'first_name' => 'Branka', 'last_name' => 'Stipić', 'email' => 'branka.stipic@hnk-osijek.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dravska 6', 'phone' => '098 547 467', 'oib' => '', 'area' => '', 'first_name' => 'Lidija', 'last_name' => 'Rancinger', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Franje Krežme 2', 'phone' => '098 878 882', 'oib' => '', 'area' => '', 'first_name' => 'Valentina', 'last_name' => 'Grgić-Smoljo', 'email' => 'mody@net.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vij. J. Gotovca 1', 'phone' => '095 514 7795', 'oib' => '', 'area' => '', 'first_name' => 'Andrej', 'last_name' => 'Mlinarević', 'email' => 'andrejmlinarevic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Krapinsko naselje 20', 'phone' => '098 339 005', 'oib' => '', 'area' => '', 'first_name' => 'Ana', 'last_name' => 'Lončarić', 'email' => 'aloncaric2000@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Mlinska 84', 'phone' => '095 903 0156', 'oib' => '', 'area' => '', 'first_name' => 'Ana', 'last_name' => 'Bajić', 'email' => 'mir.paci@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vijenac Ivana Meštrovića 68a', 'phone' => '098 936 9770', 'oib' => '', 'area' => '', 'first_name' => 'Asja', 'last_name' => 'Marolt', 'email' => 'asja.marolt@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Krstova 27', 'phone' => '091 724 8942', 'oib' => '', 'area' => '', 'first_name' => 'Anja', 'last_name' => 'Grbić', 'email' => 'anjagrbic4@net.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dragonjska 10', 'phone' => '091 576 7405', 'oib' => '', 'area' => '', 'first_name' => 'Damir', 'last_name' => 'Nađ', 'email' => 'damir.nad@inet.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Svetog Roka 25', 'phone' => '091 922 9561', 'oib' => '', 'area' => '', 'first_name' => 'Dino', 'last_name' => 'Kačar', 'email' => 'dino.kacar@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Banja lučka 4', 'phone' => '095 904 7117', 'oib' => '', 'area' => '', 'first_name' => 'Mihalj', 'last_name' => 'Tompa', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'E. Kvaternika 3', 'phone' => '098 867 197', 'oib' => '', 'area' => '', 'first_name' => 'Ljiljana', 'last_name' => 'Krističević', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Barbat 124', 'phone' => '092 299 4949', 'oib' => '', 'area' => '', 'first_name' => 'Aleksandar', 'last_name' => 'Opšenica', 'email' => 'acosenj@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Zamršje 29', 'phone' => '098 189 1389', 'oib' => '', 'area' => '', 'first_name' => 'Marina', 'last_name' => 'Bartolac', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Trg dr. F. Tuđmana 4', 'phone' => '091 731 8754', 'oib' => '', 'area' => '', 'first_name' => 'Kristina', 'last_name' => 'Ravlić', 'email' => 'kristina.ravlic@porezna-uprava.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ulica H. Republike 24', 'phone' => '098 986 5514', 'oib' => '', 'area' => '', 'first_name' => 'Melita', 'last_name' => 'Fišer', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Virska 29', 'phone' => '098 911 5745', 'oib' => '', 'area' => '', 'first_name' => 'Dominik', 'last_name' => 'Zec', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Delnička 29', 'phone' => '091 737 1664', 'oib' => '', 'area' => '', 'first_name' => 'Kristina', 'last_name' => 'Tominac', 'email' => 'ktominac@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Bartola Kašića 8', 'phone' => '098 966 7677', 'oib' => '48238215045', 'area' => '', 'first_name' => 'Darja', 'last_name' => 'Ergotić', 'email' => 'ajrad666@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vrbaska 13', 'phone' => '091 788 9820', 'oib' => '', 'area' => '', 'first_name' => 'Davor', 'last_name' => 'Šotman', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vij. I. Meštrovića 1g', 'phone' => '091 213 1183', 'oib' => '', 'area' => '', 'first_name' => 'Mirjana', 'last_name' => 'Žilić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Medulinska 5a', 'phone' => '091 559 8567', 'oib' => '', 'area' => '', 'first_name' => 'Suzana', 'last_name' => 'Oroz', 'email' => 'dino_pank@hotmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ljudevita Posavskog 31', 'phone' => '099 261 6657', 'oib' => '', 'area' => '', 'first_name' => 'ivan', 'last_name' => 'aleksi', 'email' => 'ivan.aleksi@etfos.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sjenjak 1', 'phone' => '099 634 7165', 'oib' => '', 'area' => '', 'first_name' => 'Željka', 'last_name' => 'Grujić', 'email' => 'zeljkaos39@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Drinska 10', 'phone' => '099 707 4740', 'oib' => '', 'area' => '', 'first_name' => 'Mario', 'last_name' => 'Galić', 'email' => 'mgalic@gfos.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Reisnerova 26', 'phone' => '091 575 5425', 'oib' => '', 'area' => '', 'first_name' => 'Dražen', 'last_name' => 'Stojčić', 'email' => 'drazen@romulic.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'RIJEKA 11', 'phone' => '098 260 699', 'oib' => '', 'area' => '', 'first_name' => 'Nino', 'last_name' => 'Vrbanić', 'email' => 'nino@rijekametali.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Županijska 9', 'phone' => '098 547 255', 'oib' => '', 'area' => '', 'first_name' => 'HNKera)', 'last_name' => 'U-OSIJEKU-(šifra-Gera)', 'email' => 'branka.stipic@hnk-osijek.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Voćinska 5', 'phone' => '099 539 2588', 'oib' => '', 'area' => '', 'first_name' => 'Dubravka', 'last_name' => 'Klikić-Matotek', 'email' => 'dklikic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Požeška 40', 'phone' => '098 547 231', 'oib' => '', 'area' => '', 'first_name' => 'Zlatko', 'last_name' => 'Vukušić', 'email' => 'zlatko.vukusic@os.htnet.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kaštelanska 49', 'phone' => '561 432', 'oib' => '', 'area' => '', 'first_name' => 'Nataša', 'last_name' => 'Karasek', 'email' => 'natasa.karasek@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Maksimirska 282', 'phone' => '01 29 0000 2', 'oib' => '', 'area' => '', 'first_name' => 'Zeljko', 'last_name' => 'Baotic', 'email' => 'zbaotic@gmx.de', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Rudolfa Bićanića 32', 'phone' => '095 8142 890', 'oib' => '', 'area' => '', 'first_name' => 'Monika', 'last_name' => 'Kaplan', 'email' => 'monikakaplanzg@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dragonjska 14', 'phone' => '091 537 1270', 'oib' => '', 'area' => '', 'first_name' => 'Areta', 'last_name' => 'Ćurković', 'email' => 'aretacurkovic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sjenjak 117', 'phone' => '099 317 9906', 'oib' => '', 'area' => '', 'first_name' => 'Renata', 'last_name' => 'Borovac', 'email' => 'renata.borovac@os.t-com.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vijenac Paje Kolarića 4', 'phone' => '091 600 0879', 'oib' => '', 'area' => '', 'first_name' => 'Ružica', 'last_name' => 'Brajović', 'email' => 'mirjana.brajovic031@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Divaltova 120', 'phone' => '098 167 37 45', 'oib' => '', 'area' => '', 'first_name' => 'Ivanka', 'last_name' => 'Đeri', 'email' => 'ivanka.djeri@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Lipička 1', 'phone' => '098 802 548', 'oib' => '', 'area' => '', 'first_name' => 'Draženaa)', 'last_name' => 'Vrselja-(šifra-Gera)', 'email' => 'drazena.vrselja@hnk-osijek.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'I.Kršnjavog 28', 'phone' => '098 878 919', 'oib' => '', 'area' => '', 'first_name' => 'Dario', 'last_name' => 'Mandić', 'email' => 'dario.mandic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Zagrebačka 10 B', 'phone' => '091 533 6627', 'oib' => '', 'area' => '', 'first_name' => 'Tvrtka', 'last_name' => 'Benašić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Stanka Vraza 17', 'phone' => '098 801 575', 'oib' => '', 'area' => '', 'first_name' => 'Damir', 'last_name' => 'Pešić', 'email' => 'damir.pesic@net.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'L. Jägera 6', 'phone' => '098 253 890', 'oib' => '', 'area' => '', 'first_name' => 'Tanja', 'last_name' => 'Mioković', 'email' => 'tatjana.miokovic@os.t-com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sjenjak 137', 'phone' => '0997579570', 'oib' => '', 'area' => '', 'first_name' => 'Klara', 'last_name' => 'Dumančić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Martina Divalta 923', 'phone' => '091 377 6301', 'oib' => '', 'area' => '', 'first_name' => 'Svjetlana', 'last_name' => 'Azenić-Mitrović', 'email' => 'sazenic@inet.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Rabska 22', 'phone' => '099 297 09 061', 'oib' => '', 'area' => '', 'first_name' => 'Goran', 'last_name' => 'Troskot', 'email' => 'gtroskot@gmail.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vukovarska 126a', 'phone' => '099 232 8228', 'oib' => '', 'area' => '', 'first_name' => 'Iva', 'last_name' => 'Preradović', 'email' => 'iva@adhoc.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Gornjodravska obala 86', 'phone' => '091 100 4988', 'oib' => '', 'area' => '', 'first_name' => 'Davor', 'last_name' => 'Šterijev', 'email' => 'davor.sterijev@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Drinska 123', 'phone' => '091 898 1680', 'oib' => '', 'area' => '', 'first_name' => 'Sanja', 'last_name' => 'Milinković', 'email' => 'sanja.milinkovic@euroherc.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Maceljska 14', 'phone' => '099 211 9317', 'oib' => '', 'area' => '', 'first_name' => 'Dina', 'last_name' => 'Begović', 'email' => 'dina.begovic@hnk-osijek.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Lipička 1', 'phone' => '098 802 548', 'oib' => '', 'area' => '', 'first_name' => 'Dražena', 'last_name' => 'Vršelja', 'email' => 'drazena.vrselja@hnk-osijek.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Josipa Huttlera 27', 'phone' => '098 974 6781', 'oib' => '', 'area' => '', 'first_name' => 'Darko', 'last_name' => 'Kučan', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Psunjska 55a', 'phone' => '031 303 842', 'oib' => '', 'area' => '', 'first_name' => 'Marijana', 'last_name' => 'Katušić', 'email' => 'marijana.katusic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'J. Gojkovića 6b', 'phone' => '091 530 7762', 'oib' => '', 'area' => '', 'first_name' => 'Nataša', 'last_name' => 'Viola', 'email' => 'natasa.viola@inet.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Gornjodravska obala 84', 'phone' => '099 251 6813', 'oib' => '', 'area' => '', 'first_name' => 'Ivica', 'last_name' => 'Ercegovac', 'email' => 'ivica.ercegovac@hf-group.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vinogradska 75', 'phone' => '098 130 9116', 'oib' => '', 'area' => '', 'first_name' => 'Anđelina', 'last_name' => 'Miloloža', 'email' => 'andjelina.m@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kolodvorska 59', 'phone' => '098 572 864', 'oib' => '', 'area' => '', 'first_name' => 'Berislav', 'last_name' => 'Marinić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sjenjak 137', 'phone' => '091 929 3950', 'oib' => '', 'area' => '', 'first_name' => 'Snježana', 'last_name' => 'Žiža', 'email' => 'snjezana@integra-dundovic.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Županijska 45', 'phone' => '0996701437', 'oib' => '', 'area' => '', 'first_name' => 'Lidija', 'last_name' => 'Komaromi', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Joha 1', 'phone' => '280 156', 'oib' => '', 'area' => '', 'first_name' => 'nikola', 'last_name' => 'šuljug', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vijenac Vlahe Bukovca 12', 'phone' => '098 434 572', 'oib' => '', 'area' => '', 'first_name' => 'Blaženka', 'last_name' => 'Schmidt', 'email' => 'blazenka.schmidt@saponia.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Krbavska 243', 'phone' => '099 706 0669', 'oib' => '', 'area' => '', 'first_name' => 'Suzana', 'last_name' => 'Tretinjak', 'email' => 'suzana.tretinjak@obz.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Bogdanovačka 9', 'phone' => '099 214 4614', 'oib' => '', 'area' => '', 'first_name' => 'Božana', 'last_name' => 'Matoš', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Šumska 13', 'phone' => '099 800 9974', 'oib' => '', 'area' => '', 'first_name' => 'Ivana', 'last_name' => 'Špiranović', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vinkovačka 24', 'phone' => '098 889 818', 'oib' => '', 'area' => '', 'first_name' => 'Melita', 'last_name' => 'Karakaš', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Fruškogorska 8a', 'phone' => '098 956 7361', 'oib' => '', 'area' => '', 'first_name' => 'Ruža', 'last_name' => 'Capić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Psunjska 59', 'phone' => '091 538 6179', 'oib' => '', 'area' => '', 'first_name' => 'Biserka', 'last_name' => 'Lučić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ružina 15', 'phone' => '091 918 3903', 'oib' => '', 'area' => '', 'first_name' => 'Josipa', 'last_name' => 'Božić', 'email' => 'josipabozic@inet.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vijenac Ivana Česmičkog 14', 'phone' => '098 546 820', 'oib' => '', 'area' => '', 'first_name' => 'Goran', 'last_name' => 'Milošević', 'email' => 'gmilosevic@ffos.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dobriše Cesarića 11a', 'phone' => '098 924 8198', 'oib' => '', 'area' => '', 'first_name' => 'Marijan', 'last_name' => 'Kovač', 'email' => 'kovacarh@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Bjelovarska 2', 'phone' => '095 880 5959', 'oib' => '', 'area' => '', 'first_name' => 'Sanda', 'last_name' => 'Kajfeš', 'email' => 'sanda.kajfes1@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'J. Gojkovića 8', 'phone' => '091 734 2084', 'oib' => '', 'area' => '', 'first_name' => 'Mladen', 'last_name' => 'Pavlovsky', 'email' => 'mladenpavlovsky@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vijenac I. Meštrovića 66', 'phone' => '098 561 434', 'oib' => '', 'area' => '', 'first_name' => 'Marija', 'last_name' => 'Čabaj', 'email' => 'stambukm@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Frankopanska 91 b', 'phone' => '095 901 4952', 'oib' => '', 'area' => '', 'first_name' => 'Nenad', 'last_name' => 'Pavičič', 'email' => 'nenadpavicic@hotmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Krstova 27', 'phone' => '091 783 6479', 'oib' => '', 'area' => '', 'first_name' => 'Marijana', 'last_name' => 'Grbić', 'email' => 'anjagrbic5@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Hvarska 4', 'phone' => '098 630 425', 'oib' => '', 'area' => '', 'first_name' => 'Dalibor', 'last_name' => 'Šorda', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Stadionsko naselje 74', 'phone' => '091 570 58 14', 'oib' => '', 'area' => '', 'first_name' => 'Jasna', 'last_name' => 'Kovačević', 'email' => 'jacikak@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Frankopanska 128', 'phone' => '091 797 6000', 'oib' => '', 'area' => '', 'first_name' => 'Nada', 'last_name' => 'Gabrić', 'email' => 'gabric.nada@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Josipa Kozarca 7', 'phone' => '098 233 873', 'oib' => '', 'area' => '', 'first_name' => 'Sonja', 'last_name' => 'Paradžik', 'email' => 'sonja@ibl.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dravska 35', 'phone' => '095 901 8995', 'oib' => '', 'area' => '', 'first_name' => 'Željko', 'last_name' => 'Polčić', 'email' => 'debeli.debex@gmai.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ribarska 20', 'phone' => '031 752 233', 'oib' => '', 'area' => '', 'first_name' => 'Gabrijela', 'last_name' => 'Marciuš', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Rabska 22', 'phone' => '099 297 9061', 'oib' => '', 'area' => '', 'first_name' => 'Goran', 'last_name' => 'Troskot', 'email' => 'gtroskot@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'PRENJSKA 16', 'phone' => '091 307 23 04', 'oib' => '', 'area' => '', 'first_name' => 'RENATA', 'last_name' => 'ZADRO', 'email' => 'renataz1977@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Antuna Barca 6A', 'phone' => '098 174 7062', 'oib' => '', 'area' => '', 'first_name' => 'Filip', 'last_name' => 'Stević', 'email' => 'fstevic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dubrovačka 113', 'phone' => '098 920 9149', 'oib' => '', 'area' => '', 'first_name' => 'Dalibor', 'last_name' => 'Hocenski', 'email' => 'hocenski@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Biševska 17', 'phone' => '095 517 1099', 'oib' => '', 'area' => '', 'first_name' => 'Anton', 'last_name' => 'Kristić', 'email' => 'antonkristic@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Savska 116', 'phone' => '095 199 7065', 'oib' => '', 'area' => '', 'first_name' => 'Sonja', 'last_name' => 'Varvodić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Velaluška 3', 'phone' => '091 531 3400', 'oib' => '', 'area' => '', 'first_name' => 'Dalibor', 'last_name' => 'Njari', 'email' => 'dalibor.njari@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vukovarska 141', 'phone' => '098 286 296', 'oib' => '', 'area' => '', 'first_name' => 'stjepan', 'last_name' => 'miletić', 'email' => 'stjepan.miletic1@st.t-com.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Zvečevska 26', 'phone' => '098 547 255', 'oib' => '', 'area' => '', 'first_name' => 'Branka)', 'last_name' => 'Stipić-(šifra-GERA)', 'email' => 'branka.stipic@hnk-osijek.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kod Mia', 'phone' => '099 5157 052', 'oib' => '', 'area' => '', 'first_name' => 'Nives', 'last_name' => 'Ledić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vijenac Ivana Meštrovića 20', 'phone' => '098 187 6971', 'oib' => '', 'area' => '', 'first_name' => 'Renataidović', 'last_name' => 'Rikert-i-Damir-Hamidović', 'email' => 'renata.rikert@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Psunjska 92', 'phone' => '095 901 8586', 'oib' => '', 'area' => '', 'first_name' => 'Blaženka', 'last_name' => 'Ileš', 'email' => 'blazenka.iles@facebook.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Psunjska 49', 'phone' => '098 792 896', 'oib' => '', 'area' => '', 'first_name' => 'Mira', 'last_name' => 'Jelčić', 'email' => 'kompost@os.t-com.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Fran Krste Frenkopana 14', 'phone' => '098 170 1455', 'oib' => '', 'area' => '', 'first_name' => 'Borko', 'last_name' => 'Bozic', 'email' => 'bbozic36@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Frankopanska 47', 'phone' => '091 885 1910', 'oib' => '', 'area' => '', 'first_name' => 'Nikica', 'last_name' => 'Perković', 'email' => 'nikiperk@inet.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dobriše Cesarića 16', 'phone' => '098 304 948', 'oib' => '', 'area' => '', 'first_name' => 'Vlatka', 'last_name' => 'Jurković', 'email' => 'vlatkajurkovic@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Psunjska 44', 'phone' => '091 600 0879', 'oib' => '', 'area' => '', 'first_name' => 'Mirjana', 'last_name' => 'Brajović', 'email' => 'mirjana.brajovic031@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Krstova 17a', 'phone' => '091 535 1711', 'oib' => '', 'area' => '', 'first_name' => 'Mihael', 'last_name' => 'Raff', 'email' => 'mihaelraff@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Drinska 123', 'phone' => '091 533 7111', 'oib' => '', 'area' => '', 'first_name' => 'Darija', 'last_name' => 'Kunić', 'email' => 'darija.kunic@euroherc.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dobriše Cesarića 29', 'phone' => '098 767 364', 'oib' => '', 'area' => '', 'first_name' => 'Ivona', 'last_name' => 'Balić', 'email' => 'ivonapb@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Biševska 17', 'phone' => '091 6300 092', 'oib' => '', 'area' => '', 'first_name' => 'Željka', 'last_name' => 'Rački-Kristić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Omladinska 11', 'phone' => '098 1888 244', 'oib' => '', 'area' => '', 'first_name' => 'Miroslav', 'last_name' => 'Grbeša', 'email' => 'za pare ne pitaj', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ruzina 74', 'phone' => '099 813 9302', 'oib' => '', 'area' => '', 'first_name' => 'Vedran', 'last_name' => 'Kotrba', 'email' => 'vedran.kotrba@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'dragonjska 2', 'phone' => '098 533 445', 'oib' => '', 'area' => '', 'first_name' => 'vedrana', 'last_name' => 'urošević', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Stepinca 27', 'phone' => '098 339 393', 'oib' => '', 'area' => '', 'first_name' => 'Ivica', 'last_name' => 'Leko', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Banjalučka 41', 'phone' => '098 192 9292', 'oib' => '', 'area' => '', 'first_name' => 'Jasmina', 'last_name' => 'Dohnal', 'email' => 'jasminadohnal@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Strossmayerova 188', 'phone' => '091 723 2940', 'oib' => '', 'area' => '', 'first_name' => 'Ivona', 'last_name' => 'Lovas', 'email' => 'irena_grgic@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Petrove gore 18', 'phone' => '091 592 9120', 'oib' => '', 'area' => '', 'first_name' => 'zvonimir', 'last_name' => 'forjan', 'email' => 'zvone 1964@net.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Martina Divalta 64', 'phone' => '098 187 5546', 'oib' => '', 'area' => '', 'first_name' => 'Vlatka', 'last_name' => 'Dušanek', 'email' => 'dvlatkadvlatka@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Psunjska 34', 'phone' => '099 555 55 96', 'oib' => '', 'area' => '', 'first_name' => 'Stjepan', 'last_name' => 'Udovičić', 'email' => 'stjepan@udovicic.org', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vijenac Paje Kolarića 6', 'phone' => '091 883 7520', 'oib' => '', 'area' => '', 'first_name' => 'Martina', 'last_name' => 'Valentić', 'email' => 'martina_valentic@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Prolaz Josipa Leovića 5', 'phone' => '099 401 81 28', 'oib' => '', 'area' => '', 'first_name' => 'Ivana', 'last_name' => 'Frančić', 'email' => 'francicka88@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Trpanjska 11', 'phone' => '095 816 0448', 'oib' => '', 'area' => '', 'first_name' => 'Ana', 'last_name' => 'Vila', 'email' => 'vilana7@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Zapadno predgrađe 18', 'phone' => '091 298 8737', 'oib' => '', 'area' => '', 'first_name' => 'Sanja', 'last_name' => 'Vulić', 'email' => 'sanjavulic7@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Istarska 1', 'phone' => '098 638 585', 'oib' => '', 'area' => '', 'first_name' => 'Suzana', 'last_name' => 'Bračun', 'email' => 'sb0210@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Pija', 'phone' => '098 178 4356', 'oib' => '', 'area' => '', 'first_name' => 'Borko', 'last_name' => 'prezime', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vijenac Augusta Cesarca 30', 'phone' => '091 538 82 80', 'oib' => '', 'area' => '', 'first_name' => 'Nina', 'last_name' => 'Mance', 'email' => 'nina.mance@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Trg bana Josipa Jelačića 18', 'phone' => '097 1979 669', 'oib' => '', 'area' => '', 'first_name' => 'Kristina', 'last_name' => 'Babić', 'email' => 'simfonija.pr.agencija@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sjenjak 115', 'phone' => '098 373 167', 'oib' => '', 'area' => '', 'first_name' => 'Nada', 'last_name' => 'Kožul', 'email' => 'OS571643@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Belišće', 'phone' => '098 880 0301', 'oib' => '', 'area' => '', 'first_name' => 'sasa', 'last_name' => 'rapan', 'email' => 'sasa.rapan@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ljudevita Posavskog 59', 'phone' => '095 900 2845', 'oib' => '', 'area' => '', 'first_name' => 'Siniša', 'last_name' => 'Sarkanjac', 'email' => 'sinisa55@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Franje Kuhača 31', 'phone' => '091 224 20 15', 'oib' => '', 'area' => '', 'first_name' => 'Helena', 'last_name' => 'Ristić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Medulinska 11', 'phone' => '098 601 024', 'oib' => '', 'area' => '', 'first_name' => 'Ivana', 'last_name' => 'Majstorović', 'email' => 'ivana.majstorovic28@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sjenjak 101', 'phone' => '098 372 446', 'oib' => '', 'area' => '', 'first_name' => 'JeanPierre', 'last_name' => 'Maričić', 'email' => 'jpmaricic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Matije Gupca 82a', 'phone' => '098 919 4955', 'oib' => '', 'area' => '', 'first_name' => 'Dubravka', 'last_name' => 'Smajić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Porečka 14', 'phone' => '099 200 97 78', 'oib' => '', 'area' => '', 'first_name' => 'Kristinka', 'last_name' => 'Marković', 'email' => 'kristinka.fitness@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vij. P.Gore 20', 'phone' => '095 51 76 798', 'oib' => '', 'area' => '', 'first_name' => 'Vedran', 'last_name' => 'Stipić', 'email' => 'vedran.stipic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Strossmayerova 217', 'phone' => '098 939 7609', 'oib' => '', 'area' => '', 'first_name' => 'Ivana', 'last_name' => 'Slišković', 'email' => 'ivanasliskov@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Strossmayera 156', 'phone' => '098 93 90 500', 'oib' => '', 'area' => '', 'first_name' => 'Marko', 'last_name' => 'Vukobratović', 'email' => 'marko.vukobratovic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kupska 21', 'phone' => '098 986 50 16', 'oib' => '', 'area' => '', 'first_name' => 'Daniela', 'last_name' => 'Kuže', 'email' => 'daniela.kuze@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'K. A Stepinca 5', 'phone' => '091 203 1118', 'oib' => '', 'area' => '', 'first_name' => 'Jelena', 'last_name' => 'Grgić', 'email' => 'jelena.grgic83@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dubrovačka 91', 'phone' => '091 795 5653', 'oib' => '', 'area' => '', 'first_name' => 'Andrea', 'last_name' => 'Vekić', 'email' => 'vekic.andrea@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Šamačka 11', 'phone' => '098 18 19 813', 'oib' => '', 'area' => '', 'first_name' => 'Bojana', 'last_name' => 'Muačević-Gal', 'email' => 'bojana.ckt.gea@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vodenicka 7', 'phone' => '098 252 934', 'oib' => '', 'area' => '', 'first_name' => 'Siniša', 'last_name' => 'Kraml', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sunčana', 'phone' => '099 706 6016', 'oib' => '', 'area' => '', 'first_name' => 'Marija', 'last_name' => 'Leko', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Fran Krsto Frankopana 30', 'phone' => '098 688 672', 'oib' => '', 'area' => '', 'first_name' => 'Vlatko', 'last_name' => 'Vlahek', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'J.J. Strossmayera 75', 'phone' => '091 530 1323', 'oib' => '', 'area' => '', 'first_name' => 'Ivana', 'last_name' => 'Matković', 'email' => 'ivana_zdilar@hotmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ljudevita Posavskog 14 a', 'phone' => '098 792 896', 'oib' => '', 'area' => '', 'first_name' => 'Centar', 'last_name' => 'za-kompost', 'email' => 'kompost@os.t-com.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Josipa huttlera 49', 'phone' => '099 287 8888', 'oib' => '', 'area' => '', 'first_name' => 'Tomislav', 'last_name' => 'Peric', 'email' => 'perozderotp@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Š.Petofi 204', 'phone' => '098 252 681', 'oib' => '', 'area' => '', 'first_name' => 'Dino', 'last_name' => 'Krupić', 'email' => 'dino.krupic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sljemenska 118 a', 'phone' => '099 4607 300', 'oib' => '', 'area' => '', 'first_name' => 'Dubravka', 'last_name' => 'Perković-Brković', 'email' => 'duby@inet.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dobra 23', 'phone' => '099 25 25 707', 'oib' => '', 'area' => '', 'first_name' => 'Dejan', 'last_name' => 'Šimić', 'email' => 'marketing@kljuc13.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Tvrđavica 175', 'phone' => '098 25 25 20', 'oib' => '', 'area' => '', 'first_name' => 'Miroslav', 'last_name' => 'Varga', 'email' => 'miroslav.escape@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Petefijeva 99', 'phone' => '091 4855 238', 'oib' => '', 'area' => '', 'first_name' => 'Marijo', 'last_name' => 'Lijić', 'email' => 'marijolino@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Zagrebačka 37', 'phone' => '099 367 0504', 'oib' => '', 'area' => '', 'first_name' => 'Robert', 'last_name' => 'Vučković', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Požeška 40', 'phone' => '098 9679 436', 'oib' => '', 'area' => '', 'first_name' => 'Ksenija', 'last_name' => 'Vukušić', 'email' => 'zlatko.vukusic@os.htnet.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Moslavačka 1 b', 'phone' => '098 9822 507', 'oib' => '', 'area' => '', 'first_name' => 'Vesna', 'last_name' => 'Vrselja', 'email' => 'vesna.vrselja@hnk-osijek.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Prijedorska 12', 'phone' => '098 851 745', 'oib' => '', 'area' => '', 'first_name' => 'Mara', 'last_name' => 'Šubarić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kapelska 22a', 'phone' => '098 949 7111', 'oib' => '', 'area' => '', 'first_name' => 'Anastazija', 'last_name' => 'Dorešić', 'email' => 'anastazija.doresic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vodenička 14 b', 'phone' => '091 505 1127', 'oib' => '', 'area' => '', 'first_name' => 'Antonija', 'last_name' => 'Barišić-Lasović', 'email' => 'antonijabl@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vij. G. Zobundžije 4', 'phone' => '031 368 042', 'oib' => '', 'area' => '', 'first_name' => 'Predrag', 'last_name' => 'Dotlić', 'email' => 'pdotlic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Novogradiška 17', 'phone' => '091 588 0400', 'oib' => '', 'area' => '', 'first_name' => 'Dinko', 'last_name' => 'Babić', 'email' => 'dinko.babic@euroherc.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Prenjska 49', 'phone' => '095 555 9999', 'oib' => '', 'area' => '', 'first_name' => 'Dario', 'last_name' => 'Budimir', 'email' => 'dario.budimir@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'J.J. Strossmayera 75', 'phone' => '091 570 1471', 'oib' => '', 'area' => '', 'first_name' => 'Ana', 'last_name' => 'Dagen', 'email' => 'ana.dagen@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kalnička 22', 'phone' => '098 872 601', 'oib' => '', 'area' => '', 'first_name' => 'Marija', 'last_name' => 'Orkić', 'email' => 'marija.orkic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kestenova 54', 'phone' => '098 350 069', 'oib' => '', 'area' => '', 'first_name' => 'Vedran', 'last_name' => 'Stapić', 'email' => 'vstapic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Zadarska 2a', 'phone' => '095 909 73 53', 'oib' => '', 'area' => '', 'first_name' => 'Mario', 'last_name' => 'Žaper', 'email' => 'zapermario@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vijenac Ivana Meštrovića 48', 'phone' => '091 224 6125', 'oib' => '', 'area' => '', 'first_name' => 'Časlav', 'last_name' => 'Livada', 'email' => 'clivada@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sljemenska 58', 'phone' => '099 460 7303', 'oib' => '', 'area' => '', 'first_name' => 'Boris', 'last_name' => 'Wilhelm', 'email' => 'b.wilhelm@overseas.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Strossmayerova 198', 'phone' => '091 2424 285', 'oib' => '', 'area' => '', 'first_name' => 'Damir', 'last_name' => 'Čačić', 'email' => 'damircacic@ymail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vrtić mercator', 'phone' => '091 792 9580', 'oib' => '', 'area' => '', 'first_name' => 'Višnja', 'last_name' => 'Kljaić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Crkvena 115 c', 'phone' => '098 165 0277', 'oib' => '', 'area' => '', 'first_name' => 'Ljerka', 'last_name' => 'Holeš', 'email' => 'Hljerka@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Reisnerova 26', 'phone' => '091 175 0421', 'oib' => '', 'area' => '', 'first_name' => 'Mario', 'last_name' => 'Romulić', 'email' => 'Mario@romulic.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Gundulićeva 103', 'phone' => '099 812 6969', 'oib' => '', 'area' => '', 'first_name' => 'Igor', 'last_name' => 'Dačić', 'email' => 'igic.dacic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vrbaska 15', 'phone' => '099 810 0090', 'oib' => '', 'area' => '', 'first_name' => 'Sandra', 'last_name' => 'Šokčić', 'email' => 'sandra_ms74@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vij. I. Meštrovića 50', 'phone' => '095 8596 418', 'oib' => '', 'area' => '', 'first_name' => 'Jasna', 'last_name' => 'Novotni', 'email' => 'jasna.0601@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Medulinska 13', 'phone' => '091 956 5326', 'oib' => '', 'area' => '', 'first_name' => 'Tanja', 'last_name' => 'Miklavčić', 'email' => 'Tanja.vujasinovic@zg.t-com.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Zmaj J. Jovanovića 19a', 'phone' => '095 810 0032', 'oib' => '', 'area' => '', 'first_name' => 'Monika', 'last_name' => 'Marković', 'email' => 'Monika.Markovic@pfos.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Gornjodravska 98', 'phone' => '091 1565717', 'oib' => '', 'area' => '', 'first_name' => 'Branimira', 'last_name' => 'Kandić-Splavski', 'email' => 'brana.amb@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Đure Đakovića 25', 'phone' => '031 741 544', 'oib' => '', 'area' => '', 'first_name' => 'Olga', 'last_name' => 'Rajs', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Trg Lava Mirskog 2', 'phone' => '091 518 0276', 'oib' => '', 'area' => '', 'first_name' => 'Boris', 'last_name' => 'Ocić', 'email' => 'boris.ocic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vijenac Josipa Kozarca 17', 'phone' => '091 212 4400', 'oib' => '', 'area' => '', 'first_name' => 'Erich', 'last_name' => 'Faller', 'email' => 'erichfaller@yahoo.de', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kesten', 'phone' => '098 630 276', 'oib' => '', 'area' => '', 'first_name' => 'Hale', 'last_name' => 'prezime', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Divaltova 26', 'phone' => '095 861 6291', 'oib' => '', 'area' => '', 'first_name' => 'Tin', 'last_name' => 'Kovačević', 'email' => 'tin_vulgaris@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vinkovačka 82', 'phone' => '091 151 2792', 'oib' => '', 'area' => '', 'first_name' => 'Željko', 'last_name' => 'Prša', 'email' => 'Zeljko.prsa@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vrbaska 1b', 'phone' => '098 920 0224', 'oib' => '', 'area' => '', 'first_name' => 'Kristina', 'last_name' => 'Podobnik', 'email' => 'kristina_podobnik@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Savska 14', 'phone' => '091 591 3846', 'oib' => '', 'area' => '', 'first_name' => 'Mirna', 'last_name' => 'Lauc', 'email' => 'Mlauc46@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kralja Petra Svačića 4', 'phone' => '091 785 5799', 'oib' => '', 'area' => '', 'first_name' => 'Ivan', 'last_name' => 'Kapetanović', 'email' => 'liftboy@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'ISTARSKI PROLAZ 1', 'phone' => '091 5520782', 'oib' => '56240190561', 'area' => '', 'first_name' => 'KARMEN', 'last_name' => 'PODNER', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vatrogasna 74', 'phone' => '031570178', 'oib' => '', 'area' => '', 'first_name' => 'Ivan', 'last_name' => 'Rešetar', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Strossmayera 103', 'phone' => '031375542', 'oib' => '', 'area' => '', 'first_name' => 'Nada', 'last_name' => 'Bogdan', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sjenjak 101', 'phone' => '031571788', 'oib' => '', 'area' => '', 'first_name' => 'Tomislav', 'last_name' => 'Dobrošević', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Velebitska 36 B', 'phone' => '031561355', 'oib' => '', 'area' => '', 'first_name' => 'Sava', 'last_name' => 'Mijakić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Divaltova 96', 'phone' => '031 580 413', 'oib' => '', 'area' => '', 'first_name' => 'Ljubomir', 'last_name' => 'Ninković', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Porečka 31', 'phone' => '031 564 149', 'oib' => '', 'area' => '', 'first_name' => 'Irena', 'last_name' => 'Radan', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'D. Cesarića 13A', 'phone' => '031 207 259', 'oib' => '', 'area' => '', 'first_name' => 'Jasna', 'last_name' => 'Folivarski', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sv. Ane 57', 'phone' => '098 354 250', 'oib' => '', 'area' => '', 'first_name' => 'Stevo', 'last_name' => 'Prelić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Divaltova 64', 'phone' => '0981875546, ili 0989844515', 'oib' => '', 'area' => '', 'first_name' => 'Vlatka', 'last_name' => 'Dušanek', 'email' => 'dvlatkadvlatka@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Psunjska 70', 'phone' => '091 253 9559', 'oib' => '', 'area' => '', 'first_name' => 'Mihael', 'last_name' => 'Šilac', 'email' => 'mihaelsilac@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Županijska 5a', 'phone' => '091 531 4777', 'oib' => '', 'area' => '', 'first_name' => 'Božidar', 'last_name' => 'Horvat', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Reisnerova 113', 'phone' => '0989275199', 'oib' => '', 'area' => '', 'first_name' => 'Lidija', 'last_name' => 'Prlić', 'email' => 'lidija.prlic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Put Podstina 13', 'phone' => '091 551 2716', 'oib' => '86050358021', 'area' => '', 'first_name' => 'Anna', 'last_name' => 'Tuszynska', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sprečanska 31', 'phone' => '091 598 37 51', 'oib' => '', 'area' => '', 'first_name' => 'Iva', 'last_name' => 'Jozić', 'email' => 'ivajoo@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Tvrđavica 175', 'phone' => '099 842 4883', 'oib' => '', 'area' => '', 'first_name' => 'Maja', 'last_name' => 'Varga', 'email' => 'maja.ruta@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Poslovna Zona Labinci bb', 'phone' => '052.434.774 ili 091.434.7740', 'oib' => 'HR14867880394', 'area' => '', 'first_name' => 'Larisao.', 'last_name' => 'Radin-RadinR.-d.o.o.', 'email' => 'radin@radin-r.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Savska 2', 'phone' => '092 323 0134', 'oib' => '', 'area' => '', 'first_name' => 'Hrvoje', 'last_name' => 'Hanzer', 'email' => 'hrvoje.hanzer@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dragonjska 14', 'phone' => '091/512-4881', 'oib' => '', 'area' => '', 'first_name' => 'Tihomir', 'last_name' => 'Ćurković', 'email' => 'tihomir.curak@hotmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'J. Kozarca 8', 'phone' => '095 9063331', 'oib' => '', 'area' => '', 'first_name' => 'Natasa', 'last_name' => 'Karasek', 'email' => 'natasa.karasek@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Tvrđavica 175', 'phone' => '098252520', 'oib' => '', 'area' => '', 'first_name' => 'Miroslav', 'last_name' => 'Vavrag', 'email' => 'miroslav.escape@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vatrogasna 123', 'phone' => '091/5473164', 'oib' => '', 'area' => '', 'first_name' => 'Tibor', 'last_name' => 'Bajus', 'email' => 'tbajus@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'I.G. Kovačića 13', 'phone' => '099 703 2159', 'oib' => '', 'area' => '', 'first_name' => 'Stanislava', 'last_name' => 'Kondić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'ANDRIJE KRSULA', 'phone' => '098 632 632', 'oib' => '56910278007', 'area' => '', 'first_name' => 'Jasmina', 'last_name' => 'Tijan', 'email' => 'racun@hi.t-com.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Banova 102', 'phone' => '098 594 090', 'oib' => '', 'area' => '', 'first_name' => 'darko', 'last_name' => 'brkić', 'email' => 'darko.brkic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Mahatme Gandhija 21', 'phone' => '092 314 9750', 'oib' => '72787988422', 'area' => '', 'first_name' => 'Robert', 'last_name' => 'Godrijan', 'email' => 'robiheli@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ljudevita Posavskog 29', 'phone' => '0914691792', 'oib' => '', 'area' => '', 'first_name' => 'Stjepan', 'last_name' => 'Seleši', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Pleternička 28', 'phone' => '0989396333', 'oib' => '', 'area' => '', 'first_name' => 'Roberta', 'last_name' => 'Subjak', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'V. I. Meštrovića 18', 'phone' => '098 479 015', 'oib' => '', 'area' => '', 'first_name' => 'Tereza', 'last_name' => 'Markotić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ilirska 27', 'phone' => '098 174 8381', 'oib' => '', 'area' => '', 'first_name' => 'Martina', 'last_name' => 'Katić', 'email' => 'mkatic983@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Divaltova 26', 'phone' => '091 514 2833', 'oib' => '', 'area' => '', 'first_name' => 'Zdravka', 'last_name' => 'Krivdić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Zrinjevac bb', 'phone' => '099 720 0540', 'oib' => '', 'area' => '', 'first_name' => 'Filip', 'last_name' => 'Španić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Žrtava Fašizma 63a', 'phone' => 'O91 552 5363', 'oib' => '93819248881', 'area' => '', 'first_name' => 'Branka', 'last_name' => 'Ferić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ilirska 27', 'phone' => '0912503991', 'oib' => '', 'area' => '', 'first_name' => 'Krešimir', 'last_name' => 'Milas', 'email' => 'kreso.milas@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Gunduliceva 103.', 'phone' => '091 612 6969', 'oib' => '', 'area' => '', 'first_name' => 'Igor', 'last_name' => 'Dacic', 'email' => 'igic.dacic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Bana Josipa Jelačića 29', 'phone' => '091 798 5360', 'oib' => '', 'area' => '', 'first_name' => 'Marko', 'last_name' => 'Buljan', 'email' => 'mark.buljan@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vijenac Murse 1', 'phone' => '099 226 5055', 'oib' => '', 'area' => '', 'first_name' => 'Andrea', 'last_name' => 'Ferenc', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Trpanjska 9', 'phone' => '091 507 5971', 'oib' => '', 'area' => '', 'first_name' => 'Zorka', 'last_name' => 'Uglik', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Brijest sprecanska 15', 'phone' => '0912033045', 'oib' => '', 'area' => '', 'first_name' => 'Vanja', 'last_name' => 'Ostojic', 'email' => 'Anjavostojic', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Novogradiška 45', 'phone' => '095 813 4381', 'oib' => '', 'area' => '', 'first_name' => 'Damir', 'last_name' => 'Tivanovac', 'email' => 'teevich@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Srijemska 53', 'phone' => '099 734 6832', 'oib' => '', 'area' => '', 'first_name' => 'Duje', 'last_name' => 'Plazibat', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'SJENJAK 137 ', 'phone' => '099759570', 'oib' => '', 'area' => '', 'first_name' => 'KLARA', 'last_name' => 'DUMANČIĆ', 'email' => 'klara165@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Vijenac Ivana Mestrovica 80', 'phone' => '098 645 169', 'oib' => '', 'area' => '', 'first_name' => 'andreja', 'last_name' => 'juricevic', 'email' => 'deja.juricevic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'L.Jagera 6', 'phone' => '095 901 64 67', 'oib' => '', 'area' => '', 'first_name' => 'Davor', 'last_name' => 'Petrović', 'email' => 'davorpet@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'I. G. Kovačića 1a', 'phone' => '098 928 25 32', 'oib' => '', 'area' => '', 'first_name' => 'Vedran', 'last_name' => 'Prister', 'email' => '2vedran.prister@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Šamačka 1', 'phone' => '098 534 778 580', 'oib' => '', 'area' => '', 'first_name' => 'Silvija', 'last_name' => 'Mihaljević', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Delnička 29A', 'phone' => '098 984 4538', 'oib' => '', 'area' => '', 'first_name' => 'Mirko', 'last_name' => 'Balić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ruđera Boškovića 12a', 'phone' => '098 866 766', 'oib' => '', 'area' => '', 'first_name' => 'Zlatko', 'last_name' => 'Pejić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Šamačka 34', 'phone' => 'fdg', 'oib' => '', 'area' => '', 'first_name' => 'df', 'last_name' => 'prezime', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Divaltova 102', 'phone' => '098 211 469', 'oib' => '', 'area' => '', 'first_name' => 'Dario', 'last_name' => 'Soldić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Caffe Bar Club', 'phone' => '099 333 6363', 'oib' => '', 'area' => '', 'first_name' => 'Dalibor', 'last_name' => 'Borota', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sjenjak 55', 'phone' => '098 953 9995', 'oib' => '', 'area' => '', 'first_name' => 'Milan', 'last_name' => 'Vidačić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Europska avenija 20', 'phone' => '0915358693', 'oib' => '', 'area' => '', 'first_name' => 'zorin', 'last_name' => 'radovancevic', 'email' => 'zorin@escapestudio.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'A.G. Matoša 8', 'phone' => '099 216 0540', 'oib' => '86786370678', 'area' => '', 'first_name' => 'Ivana', 'last_name' => 'Mladinić', 'email' => 'ivanamladinic@net.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Reisnerova 30', 'phone' => '098 984 3510', 'oib' => '', 'area' => '', 'first_name' => 'Branimir', 'last_name' => 'Keler', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Lokrumska 34', 'phone' => '098636584', 'oib' => '', 'area' => '', 'first_name' => 'Suzana', 'last_name' => 'Biondić', 'email' => 'suzabiondic@yahoo.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Listopadska 5', 'phone' => '098/9231717', 'oib' => '82685047603', 'area' => '', 'first_name' => 'Andrija', 'last_name' => 'Šaban', 'email' => 'andrija.saban@zg.t-com.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Caffe bar Club', 'phone' => '098 252 070', 'oib' => '', 'area' => '', 'first_name' => 'Krešo', 'last_name' => 'Kuna', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Cafe bar Kesten', 'phone' => '099 099 099', 'oib' => '', 'area' => '', 'first_name' => 'Gabrijela', 'last_name' => 'Damjanović', 'email' => 'gabrijela.bacic@vk.t-com.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ilica 170', 'phone' => '098 906 4999', 'oib' => '9999999999999', 'area' => '', 'first_name' => 'Mirjana', 'last_name' => 'Zorić', 'email' => 'bruno.zoric@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Josipa Jurja Strossmayera 91', 'phone' => '0981744594', 'oib' => '', 'area' => '', 'first_name' => 'Mario', 'last_name' => 'Danic', 'email' => 'mario.danic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kras 151', 'phone' => '098 942 2207', 'oib' => '1', 'area' => '', 'first_name' => 'Josip', 'last_name' => 'Justinić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Jv. J. radnika 29', 'phone' => '091 1509813', 'oib' => '', 'area' => '', 'first_name' => 'vedran', 'last_name' => 'kralj', 'email' => 'vedran@trotoar.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Bosutsko naselje 43', 'phone' => '091 516 3991', 'oib' => '9999999999999', 'area' => '', 'first_name' => 'Igor', 'last_name' => 'Stojić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Naselje Miroslava Krleze 7', 'phone' => '0921721401', 'oib' => '', 'area' => '', 'first_name' => 'stjepan', 'last_name' => 'mikulic', 'email' => 'mika.stjepan @gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sjenjak 93', 'phone' => '095 2571517', 'oib' => '', 'area' => '', 'first_name' => 'Hrvoje', 'last_name' => 'Svetinovic', 'email' => 'hrvoje@orka.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ulica Grada Vukovara 3', 'phone' => '0958714672', 'oib' => '', 'area' => '', 'first_name' => 'Renata', 'last_name' => 'Klarić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ilirska 71', 'phone' => '0992200767', 'oib' => '', 'area' => '', 'first_name' => 'Marina', 'last_name' => 'Peko', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'B. J. Jelačića 91', 'phone' => '099/589 - 59 - 07', 'oib' => '', 'area' => '', 'first_name' => 'Aleksandra', 'last_name' => 'Pipek', 'email' => 'aleksandra.kolev@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dalmatinska 18f', 'phone' => '0989850182', 'oib' => '75649573092', 'area' => '', 'first_name' => 'marijana', 'last_name' => 'piantanida', 'email' => 'marijanadbk@net.hr', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Dalmatinska 43', 'phone' => '0919574442', 'oib' => '21191669594', 'area' => '', 'first_name' => 'vanda', 'last_name' => 'jelas', 'email' => 'vanda.jelas@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'SJENJAK 28', 'phone' => '098 362 208', 'oib' => '', 'area' => '', 'first_name' => 'LIDIJA', 'last_name' => 'TERZIĆ', 'email' => 'lidija.blazevic@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Bakarska 13', 'phone' => '098 580 319', 'oib' => '1', 'area' => '', 'first_name' => 'Marija', 'last_name' => 'Tomas', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Franjevačka 12', 'phone' => '098 580 319', 'oib' => '1', 'area' => '', 'first_name' => 'Jasmina', 'last_name' => 'Poznić', 'email' => '091 252 3834', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Paradžikova 28', 'phone' => '0992924000', 'oib' => '', 'area' => '', 'first_name' => 'Ivana', 'last_name' => 'Parađiković', 'email' => 'ivana@agroklub.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ulica mira 9', 'phone' => '095 911 67 05', 'oib' => '65498544098', 'area' => '', 'first_name' => 'Maruska', 'last_name' => 'Schwengersbauer', 'email' => 'maruska.schwengersbauer@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Drinska 87', 'phone' => '098 165 0237', 'oib' => '', 'area' => '', 'first_name' => 'Danijel', 'last_name' => 'Lasinger', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Marjanska 57', 'phone' => '+385 91 155 5757', 'oib' => '', 'area' => '', 'first_name' => 'vlado', 'last_name' => 'plentaj', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'I. Mažuranića 6', 'phone' => '098 437 097', 'oib' => '', 'area' => '', 'first_name' => 'Marija', 'last_name' => 'Tripolski', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sutlanska 1', 'phone' => '098 813 898', 'oib' => '', 'area' => '', 'first_name' => 'Renata', 'last_name' => 'Petrović', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Gornjodravska 90b', 'phone' => '099 320 0785', 'oib' => '', 'area' => '', 'first_name' => 'Dina', 'last_name' => 'Rechner', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Daruvarska 62', 'phone' => '091 505 8608', 'oib' => '', 'area' => '', 'first_name' => 'Ines', 'last_name' => 'Žugec', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Martina Divalta 120', 'phone' => '0997923087', 'oib' => '', 'area' => '', 'first_name' => 'Hrvoje', 'last_name' => 'Cini', 'email' => 'cini.hrvoje@gmail.com', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Caprice 2', 'phone' => '091 666 5556', 'oib' => '', 'area' => '', 'first_name' => 'Robert', 'last_name' => 'Tot', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kesten 12', 'phone' => '099 311 7016', 'oib' => '', 'area' => '', 'first_name' => 'Rino', 'last_name' => 'Pinchler', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Kesten 33', 'phone' => '099 209 1019', 'oib' => '', 'area' => '', 'first_name' => 'Šlezak', 'last_name' => 'prezime', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Martina Divalta 144', 'phone' => '098 570 359', 'oib' => '', 'area' => '', 'first_name' => 'Rora', 'last_name' => 'prezime', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Martina Divalta 230', 'phone' => '098 690 771', 'oib' => '', 'area' => '', 'first_name' => 'Pavle', 'last_name' => 'Vidaković', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Hrv. Republike 31c', 'phone' => '0915015850', 'oib' => '', 'area' => '', 'first_name' => 'Ivana', 'last_name' => 'Pejić-Šmit', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Murska 8', 'phone' => '091 203 1116', 'oib' => '', 'area' => '', 'first_name' => 'Tomo', 'last_name' => 'Čizmadija', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Peppermint', 'phone' => '23123231', 'oib' => '123', 'area' => '', 'first_name' => 'Lignjo', 'last_name' => 'prezime', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Sprecanska 15', 'phone' => '031273022', 'oib' => '', 'area' => '', 'first_name' => 'Vanja', 'last_name' => 'Ostojic', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Stepinčeva 20', 'phone' => '098299842', 'oib' => '', 'area' => '', 'first_name' => 'Irena', 'last_name' => 'Krtić-Jobst', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ciglarska 9a', 'phone' => '0915339456', 'oib' => '', 'area' => '', 'first_name' => 'Helen0a', 'last_name' => 'Ppejić-Jukić', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Inchoo', 'phone' => '123', 'oib' => '', 'area' => '', 'first_name' => 'Danijel', 'last_name' => 'Vrgoč', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Huttlerova 20 b', 'phone' => '099 379 0540', 'oib' => '', 'area' => '', 'first_name' => 'Stipešević', 'last_name' => 'Stipa', 'email' => '', 'city' => '83', 'region' => '14'));
User::create(array('address' => 'Ciglarska 11a', 'phone' => '091 4580 508', 'oib' => '1', 'area' => '', 'first_name' => 'Kristina', 'last_name' => 'Bajus', 'email' => '', 'city' => '83', 'region' => '14'));
	}
}


class BlogSeeder extends Seeder
{
	public function run()
	{
		Blog::create(array('title' => 'Prvi blog post stipino', 'permalink' => 'ovo-je-moj-prvi-blog-post', 'intro' => '<p>Into tj. kratki opis za blog post</p>', 'content' => '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quam dolor, egestas sed sapien vel, eleifend porttitor dui. Morbi massa velit, dictum vitae condimentum id, placerat elementum urna. Nunc malesuada magna id erat imperdiet, eget congue ex ultrices. Nulla sit amet consectetur lorem. Sed rutrum lobortis purus, eu varius nisi porta at. Nulla vel est turpis. Pellentesque suscipit suscipit tellus a facilisis. Vestibulum placerat varius blandit. In viverra mauris eget purus iaculis, tristique blandit orci consectetur. Cras pharetra placerat magna, vitae interdum lorem dignissim vitae. Donec sit amet molestie quam. Aenean ipsum lorem, luctus a malesuada accumsan, dictum a libero. Ut dignissim, massa eu ultrices elementum, dolor erat ullamcorper magna, in tincidunt elit mauris non dui. Phasellus non sollicitudin est.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Mauris et vehicula purus, nec imperdiet enim. Pellentesque varius mi arcu, ac scelerisque lacus tristique vel. Pellentesque lobortis hendrerit sapien eu sollicitudin. Phasellus accumsan, sem ac rhoncus ornare, erat tortor eleifend ipsum, non sodales nisi ante varius tortor. Proin mollis dapibus dolor sed scelerisque. Sed condimentum lobortis lorem, id dignissim lectus. Praesent fermentum enim vel neque hendrerit consequat. In sed malesuada metus, sit amet pretium enim. Praesent ac velit et elit auctor gravida. Proin iaculis condimentum commodo. Aliquam pharetra, metus gravida fermentum placerat, augue dui scelerisque est, sit amet pulvinar tellus quam ut dui.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Curabitur nulla massa, molestie et tortor quis, imperdiet imperdiet lacus. Maecenas in tristique ligula. Cras semper non orci at lacinia. Quisque dapibus et tortor elementum molestie. Nam at imperdiet nisl. Pellentesque dignissim fringilla eros, nec feugiat odio aliquam at. Phasellus id tempor nisl, ac cursus metus. In hac habitasse platea dictumst. Sed sit amet sapien odio. Aenean at ipsum porttitor urna congue consequat at non sapien. Nullam varius lobortis arcu, non tempor augue euismod eu.</p>', 'category' => '1', 'type' => 'blog', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'workshop_date' => '0000-00-00' ));
		Blog::create(array('title' => 'Drugi blog post stipino', 'permalink' => 'ovo-je-moj-drugi-blog-post', 'intro' => '<p>Into tj. kratki opis za blog post</p>', 'content' => '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quam dolor, egestas sed sapien vel, eleifend porttitor dui. Morbi massa velit, dictum vitae condimentum id, placerat elementum urna. Nunc malesuada magna id erat imperdiet, eget congue ex ultrices. Nulla sit amet consectetur lorem. Sed rutrum lobortis purus, eu varius nisi porta at. Nulla vel est turpis. Pellentesque suscipit suscipit tellus a facilisis. Vestibulum placerat varius blandit. In viverra mauris eget purus iaculis, tristique blandit orci consectetur. Cras pharetra placerat magna, vitae interdum lorem dignissim vitae. Donec sit amet molestie quam. Aenean ipsum lorem, luctus a malesuada accumsan, dictum a libero. Ut dignissim, massa eu ultrices elementum, dolor erat ullamcorper magna, in tincidunt elit mauris non dui. Phasellus non sollicitudin est.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Mauris et vehicula purus, nec imperdiet enim. Pellentesque varius mi arcu, ac scelerisque lacus tristique vel. Pellentesque lobortis hendrerit sapien eu sollicitudin. Phasellus accumsan, sem ac rhoncus ornare, erat tortor eleifend ipsum, non sodales nisi ante varius tortor. Proin mollis dapibus dolor sed scelerisque. Sed condimentum lobortis lorem, id dignissim lectus. Praesent fermentum enim vel neque hendrerit consequat. In sed malesuada metus, sit amet pretium enim. Praesent ac velit et elit auctor gravida. Proin iaculis condimentum commodo. Aliquam pharetra, metus gravida fermentum placerat, augue dui scelerisque est, sit amet pulvinar tellus quam ut dui.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Curabitur nulla massa, molestie et tortor quis, imperdiet imperdiet lacus. Maecenas in tristique ligula. Cras semper non orci at lacinia. Quisque dapibus et tortor elementum molestie. Nam at imperdiet nisl. Pellentesque dignissim fringilla eros, nec feugiat odio aliquam at. Phasellus id tempor nisl, ac cursus metus. In hac habitasse platea dictumst. Sed sit amet sapien odio. Aenean at ipsum porttitor urna congue consequat at non sapien. Nullam varius lobortis arcu, non tempor augue euismod eu.</p>', 'category' => '1', 'type' => 'blog', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'workshop_date' => '0000-00-00'));
		Blog::create(array('title' => 'Treći blog post stipino', 'permalink' => 'treci-blog-post-stipino', 'intro' => '<p>Into tj. kratki opis za blog post</p>', 'content' => '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quam dolor, egestas sed sapien vel, eleifend porttitor dui. Morbi massa velit, dictum vitae condimentum id, placerat elementum urna. Nunc malesuada magna id erat imperdiet, eget congue ex ultrices. Nulla sit amet consectetur lorem. Sed rutrum lobortis purus, eu varius nisi porta at. Nulla vel est turpis. Pellentesque suscipit suscipit tellus a facilisis. Vestibulum placerat varius blandit. In viverra mauris eget purus iaculis, tristique blandit orci consectetur. Cras pharetra placerat magna, vitae interdum lorem dignissim vitae. Donec sit amet molestie quam. Aenean ipsum lorem, luctus a malesuada accumsan, dictum a libero. Ut dignissim, massa eu ultrices elementum, dolor erat ullamcorper magna, in tincidunt elit mauris non dui. Phasellus non sollicitudin est.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Mauris et vehicula purus, nec imperdiet enim. Pellentesque varius mi arcu, ac scelerisque lacus tristique vel. Pellentesque lobortis hendrerit sapien eu sollicitudin. Phasellus accumsan, sem ac rhoncus ornare, erat tortor eleifend ipsum, non sodales nisi ante varius tortor. Proin mollis dapibus dolor sed scelerisque. Sed condimentum lobortis lorem, id dignissim lectus. Praesent fermentum enim vel neque hendrerit consequat. In sed malesuada metus, sit amet pretium enim. Praesent ac velit et elit auctor gravida. Proin iaculis condimentum commodo. Aliquam pharetra, metus gravida fermentum placerat, augue dui scelerisque est, sit amet pulvinar tellus quam ut dui.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Curabitur nulla massa, molestie et tortor quis, imperdiet imperdiet lacus. Maecenas in tristique ligula. Cras semper non orci at lacinia. Quisque dapibus et tortor elementum molestie. Nam at imperdiet nisl. Pellentesque dignissim fringilla eros, nec feugiat odio aliquam at. Phasellus id tempor nisl, ac cursus metus. In hac habitasse platea dictumst. Sed sit amet sapien odio. Aenean at ipsum porttitor urna congue consequat at non sapien. Nullam varius lobortis arcu, non tempor augue euismod eu.</p>', 'category' => '1', 'type' => 'blog', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'workshop_date' => '0000-00-00'));
		Blog::create(array('title' => 'Četvrti blog post stipino', 'permalink' => 'ovo-je-moj-cetvrti-blog-post', 'intro' => '<p>Into tj. kratki opis za blog post</p>', 'content' => '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quam dolor, egestas sed sapien vel, eleifend porttitor dui. Morbi massa velit, dictum vitae condimentum id, placerat elementum urna. Nunc malesuada magna id erat imperdiet, eget congue ex ultrices. Nulla sit amet consectetur lorem. Sed rutrum lobortis purus, eu varius nisi porta at. Nulla vel est turpis. Pellentesque suscipit suscipit tellus a facilisis. Vestibulum placerat varius blandit. In viverra mauris eget purus iaculis, tristique blandit orci consectetur. Cras pharetra placerat magna, vitae interdum lorem dignissim vitae. Donec sit amet molestie quam. Aenean ipsum lorem, luctus a malesuada accumsan, dictum a libero. Ut dignissim, massa eu ultrices elementum, dolor erat ullamcorper magna, in tincidunt elit mauris non dui. Phasellus non sollicitudin est.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Mauris et vehicula purus, nec imperdiet enim. Pellentesque varius mi arcu, ac scelerisque lacus tristique vel. Pellentesque lobortis hendrerit sapien eu sollicitudin. Phasellus accumsan, sem ac rhoncus ornare, erat tortor eleifend ipsum, non sodales nisi ante varius tortor. Proin mollis dapibus dolor sed scelerisque. Sed condimentum lobortis lorem, id dignissim lectus. Praesent fermentum enim vel neque hendrerit consequat. In sed malesuada metus, sit amet pretium enim. Praesent ac velit et elit auctor gravida. Proin iaculis condimentum commodo. Aliquam pharetra, metus gravida fermentum placerat, augue dui scelerisque est, sit amet pulvinar tellus quam ut dui.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Curabitur nulla massa, molestie et tortor quis, imperdiet imperdiet lacus. Maecenas in tristique ligula. Cras semper non orci at lacinia. Quisque dapibus et tortor elementum molestie. Nam at imperdiet nisl. Pellentesque dignissim fringilla eros, nec feugiat odio aliquam at. Phasellus id tempor nisl, ac cursus metus. In hac habitasse platea dictumst. Sed sit amet sapien odio. Aenean at ipsum porttitor urna congue consequat at non sapien. Nullam varius lobortis arcu, non tempor augue euismod eu.</p>', 'category' => '1', 'type' => 'blog', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'workshop_date' => '0000-00-00'));
		Blog::create(array('title' => 'Peti blog post stipino', 'permalink' => 'ovo-je-moj-peti-blog-post', 'intro' => '<p>Into tj. kratki opis za blog post</p>', 'content' => '<p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec quam dolor, egestas sed sapien vel, eleifend porttitor dui. Morbi massa velit, dictum vitae condimentum id, placerat elementum urna. Nunc malesuada magna id erat imperdiet, eget congue ex ultrices. Nulla sit amet consectetur lorem. Sed rutrum lobortis purus, eu varius nisi porta at. Nulla vel est turpis. Pellentesque suscipit suscipit tellus a facilisis. Vestibulum placerat varius blandit. In viverra mauris eget purus iaculis, tristique blandit orci consectetur. Cras pharetra placerat magna, vitae interdum lorem dignissim vitae. Donec sit amet molestie quam. Aenean ipsum lorem, luctus a malesuada accumsan, dictum a libero. Ut dignissim, massa eu ultrices elementum, dolor erat ullamcorper magna, in tincidunt elit mauris non dui. Phasellus non sollicitudin est.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Mauris et vehicula purus, nec imperdiet enim. Pellentesque varius mi arcu, ac scelerisque lacus tristique vel. Pellentesque lobortis hendrerit sapien eu sollicitudin. Phasellus accumsan, sem ac rhoncus ornare, erat tortor eleifend ipsum, non sodales nisi ante varius tortor. Proin mollis dapibus dolor sed scelerisque. Sed condimentum lobortis lorem, id dignissim lectus. Praesent fermentum enim vel neque hendrerit consequat. In sed malesuada metus, sit amet pretium enim. Praesent ac velit et elit auctor gravida. Proin iaculis condimentum commodo. Aliquam pharetra, metus gravida fermentum placerat, augue dui scelerisque est, sit amet pulvinar tellus quam ut dui.</p><p style="margin-bottom: 15px; padding: 0px; text-align: justify; font-family: " open="" sans",="" arial,="" sans-serif;"="">Curabitur nulla massa, molestie et tortor quis, imperdiet imperdiet lacus. Maecenas in tristique ligula. Cras semper non orci at lacinia. Quisque dapibus et tortor elementum molestie. Nam at imperdiet nisl. Pellentesque dignissim fringilla eros, nec feugiat odio aliquam at. Phasellus id tempor nisl, ac cursus metus. In hac habitasse platea dictumst. Sed sit amet sapien odio. Aenean at ipsum porttitor urna congue consequat at non sapien. Nullam varius lobortis arcu, non tempor augue euismod eu.</p>', 'category' => '1','type'=>'blog', 'published' => '1', 'image' => 'stipino_500x500.jpg', 'workshop_date' => '0000-00-00'));
		
	}
}


class AboutSeeder extends Seeder
{
	public function run()
	{
		Pages::create(array('title' => 'O nama', 'permalink' => 'o-nama', 'intro' => '<p>Into tj. kratki opis za blog post</p>', 'content' => '<section id="about-header">
        <video id="bgvid" playsinline="" loop="">
            <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
            <source src="video/stipo.webm" type="video/webm">
        </video>
        <div class="about-title">
            <h1>O nama</h1>
        </div>
        <a href="#" title="Play video" class="play"></a>
    </section>
    <section id="about-main-text">
        <div class="container">
            <div class="row">
                <h2>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt. Aliquam elit ante, malesuada id, tempor eu, gravida id, odio.</h2>
            </div>
        </div>
    </section>
    <section id="about-story">
        <div class="container">
            <div class="row">
                <h3 class="text-center">Kako je sve počelo?</h3>
                <div class="col-md-6 text-center">
                    <img src="img/frontend/blog/stipo-post.jpg">
                </div>
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.
                        <br>
                        <br>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.
                    </p>
                </div>
                <div class="col-md-12">
                    <h3>Kako se nastavilo</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.
                        <br>
                        <br>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>
                </div>
                <div class="col-md-12">
                    <h3>I onda je krenulo drukcije</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 videowrapper">
                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 videowrapper">
                        <iframe width="560" height="350" src="https://www.youtube.com/embed/e6EkA19TTis" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-md-12">
                    <p>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="about-videowell">
        <div class="container-video">
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-12 videowrapper">
                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 videowrapper">
                        <iframe width="560" height="350" src="https://www.youtube.com/embed/e6EkA19TTis" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 videowrapper">
                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about-endword">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>
                </div>
            </div>
        </div>
    </section>

    <script>
    var vid = document.getElementById("bgvid");
    var pauseButton = document.querySelector("#about-header a");

    function vidFade() {
        vid.classList.add("stopfade");
    }

    vid.addEventListener("ended", function() {
        // only functional if "loop" is removed 
        vid.pause();
        // to capture IE10
        vidFade();
    });


    pauseButton.addEventListener("click", function() {
        vid.classList.toggle("stopfade");
        if (vid.paused) {
            vid.play();
            pauseButton.innerHTML = "";
        } else {
            vid.pause();
            pauseButton.innerHTML = "";
        }
    })
    $(document).ready(function() {
        var icon = $(".play");
        icon.click(function() {
            icon.toggleClass("active");
            return false;
        });
    });
    </script>', 'category' => '0', 'type' => 'page', 'image' => 'stipino_500x500.jpg'));
		
    }
}


class WorkshopSeeder extends Seeder
{
	public function run()
	{
		Workshop::create(array('title' => 'Ovo je novija radionica', 'permalink' => 'ovo-je-novija-radionica', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu pellentesque odio, et ultrices dolor. Quisque iaculis iaculis nunc ut accumsan. Vivamus semper quam ac tortor auctor, nec dignissim quam tincidunt. Mauris maximus dolor eu quam eleifend congue. Nulla facilisi. Phasellus at est ac nunc vehicula egestas. </p>', 'intro' => 'Into tj. kratki opis za radionicu', 'category' => '0', 'type' => 'workshop', 'image' => 'stipino_500x500.jpg', 'workshop_date' => '2016-11-10'));
		Workshop::create(array('title' => 'Naslov ove radionice', 'permalink' => 'poveznica-ove-radionice', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu pellentesque odio, et ultrices dolor. Quisque iaculis iaculis nunc ut accumsan. Vivamus semper quam ac tortor auctor, nec dignissim quam tincidunt. Mauris maximus dolor eu quam eleifend congue. Nulla facilisi. Phasellus at est ac nunc vehicula egestas. </p>', 'intro' => 'Into tj. kratki opis za radionicu', 'category' => '0', 'type' => 'workshop','published' => '1' ,'image' => 'stipino_500x500.jpg', 'workshop_date' => '2016-11-23'));
	    Workshop::create(array('title' => 'Zadnja radionica', 'permalink' => 'zadnja-radionica', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu pellentesque odio, et ultrices dolor. Quisque iaculis iaculis nunc ut accumsan. Vivamus semper quam ac tortor auctor, nec dignissim quam tincidunt. Mauris maximus dolor eu quam eleifend congue. Nulla facilisi. Phasellus at est ac nunc vehicula egestas. </p>', 'intro' => 'Into tj. kratki opis za radionicu', 'category' => '0', 'type' => 'workshop', 'image' => 'stipino_500x500.jpg', 'workshop_date' => '2016-12-05'));
		
	}
}


class ContactSeeder extends Seeder
{
	public function run()
	{
		Pages::create(array('title' => 'Kontakt', 'permalink' => 'kontakt', 'content' => '
        <div class="contact-header-title">
            <p>Kontakt</p>
        </div>
        <div class="container contact-form-position">
            <div class="row  ">
                <div class="col-md-8 contact-form-padding">
                    <div>
                        <input class="form-control" type="text" value="Ime i prezime" id="example-text-input">
                    </div>
                    <div>
                        <input class="form-control" type="email" value="Email" id="example-email-input">
                    </div>
                    <div>
                        <input class="form-control" type="tel" value="Broj telefona" id="example-tel-input">
                    </div>
                    <div>
                        <input class="form-control contact-form-comment-input" type="text" value="Komentar" id="example-text-input">
                    </div>
                </div>
                <div class="col-md-4 contact-form-padding contact-padding-top">
                    <div class="row contact-icon-top-margin ">
                        <div class="col-md-3 col-xs-3 contact-icons-size"><i style="padding-top:25px;" class="fa fa-map-signs" aria-hidden="true"></i></div>
                        <div class="col-md-9 col-xs-9">
                            <div>
                                <p class="contact-icon-text-size">Adresa</p>
                                <p class="contact-icon-top-margin contact-icon-text-discription">OPG Stjepan Dumancic Tomin Put 1, Ceminac 31325</p>
                            </div>
                        </div>
                    </div>
                    <div class="row contact-icon-top-margin ">
                        <div class="col-md-3 col-xs-3 contact-icons-size"><i style="padding-left:5px;" class="fa fa-phone" aria-hidden="true"></i></div>
                        <div class="col-md-9 col-xs-9">
                            <div>
                                <p class="contact-icon-text-size">Mobitel</p>
                                <p class="contact-icon-top-margin contact-icon-text-discription">+385 99 817 3880</p>
                            </div>
                        </div>
                    </div>
                    <div class="row contact-icon-top-margin ">
                        <div class="col-md-3 col-xs-3 contact-icons-size"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        <div class="col-md-9 col-xs-9">
                            <div>
                                <p class="contact-icon-text-size">E-mail</p>
                                <p class="contact-icon-top-margin contact-icon-text-discription">info@stipino.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="row contact-icon-top-margin ">
                        <div class="col-md-3 col-xs-3 contact-icons-size"><i class="fa fa-skype" aria-hidden="true"></i></div>
                        <div class="col-md-9 col-xs-9">
                            <div>
                                <p class="contact-icon-text-size">Skype</p>
                                <p class="contact-icon-top-margin contact-icon-text-discription">stjepan.dumancic</p>
                            </div>
                        </div>
                    </div>
                    <div class="row contact-icon-top-margin ">
                        <div class="col-md-3 col-xs-3 contact-icons-size"><i class="fa fa-facebook-official" aria-hidden="true"></i> </div>
                        <div class="col-md-9 col-xs-9">
                            <div>
                                <p class="contact-icon-text-size">FB fan page</p>
                                <p class="contact-icon-top-margin contact-icon-text-discription">www.facebook.com/stipinooo</p>
                            </div>
                        </div>
                    </div>
                    <div class="row contact-icon-top-margin ">
                        <div class="col-md-3 col-xs-3 contact-icons-size"><i style="padding-left:5px;" class="fa fa-map-marker" aria-hidden="true"></i> </div>
                        <div class="col-md-9 col-xs-9">
                            <div>
                                <p class="contact-icon-text-size">Lokacija(lon,lat)</p>
                                <p class="contact-icon-top-margin contact-icon-text-discription">https://goo.gl/AcpqIL</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-button-div-margin">
                <button class="contact-form-send-button">Pošalji!</button>
            </div>
        </div>
        <div class="container">
            <div id="map" class="contact-gm-size"></div>
        </div>
         <script>
        (function(i, s, o, g, r, a, m) {
            i["GoogleAnalyticsObject"] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, "script", "https://www.google-analytics.com/analytics.js", "ga");

        ga("create", "UA-2555128-15", "auto");
        ga("send", "pageview");
        </script>
         
        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    </div>
    <script>
    function initMap() {
        var uluru = {
            lat: 45.6699994,
            lng: 18.6730698
        };
        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 16,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1lTu-PZf-pmNGVuSvX4Dm7-svk6_MWOw&callback=initMap">
    </script>', 'intro' => 'Kratki opis', 'category' => '0', 'type' => 'page', 'image' => 'stipino_500x500.jpg'));	
	}
}




class AccommodationSeeder extends Seeder
{
	public function run()
	{
		Pages::create(array('title' => 'Smještaj', 'permalink' => 'smjestaj', 'intro' => '<p>Into tj. kratki opis za blog post</p>', 'content' => '<section id="about-header">
        <video id="bgvid" playsinline="" loop="">
            <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
            <source src="video/stipo.webm" type="video/webm">
        </video>
        <div class="about-title">
            <h1>O nama</h1>
        </div>
        <a href="#" title="Play video" class="play"></a>
    </section>
    <section id="about-main-text">
        <div class="container">
            <div class="row">
                <h2>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt. Aliquam elit ante, malesuada id, tempor eu, gravida id, odio.</h2>
            </div>
        </div>
    </section>
    <section id="about-story">
        <div class="container">
            <div class="row">
                <h3 class="text-center">Kako je sve počelo?</h3>
                <div class="col-md-6 text-center">
                    <img src="img/frontend/blog/stipo-post.jpg">
                </div>
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.
                        <br>
                        <br>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.
                    </p>
                </div>
                <div class="col-md-12">
                    <h3>Kako se nastavilo</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.
                        <br>
                        <br>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>
                </div>
                <div class="col-md-12">
                    <h3>I onda je krenulo drukcije</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 videowrapper">
                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 videowrapper">
                        <iframe width="560" height="350" src="https://www.youtube.com/embed/e6EkA19TTis" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-md-12">
                    <p>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="about-videowell">
        <div class="container-video">
            <div class="row">
                <div class="col-md-4">
                    <div class="col-md-12 videowrapper">
                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 videowrapper">
                        <iframe width="560" height="350" src="https://www.youtube.com/embed/e6EkA19TTis" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 videowrapper">
                        <iframe width="560" height="350" src="https://www.youtube.com/embed/9sEI1AUFJKw" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about-endword">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Aliquam elit ante, malesuada id, tempor eu, gravida id, odio. Maecenas suscipit, risus et eleifend imperdiet. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec mollis. Quisque convallis libero in sapien pharetra tincidunt.</p>
                </div>
            </div>
        </div>
    </section>

    <script>
    var vid = document.getElementById("bgvid");
    var pauseButton = document.querySelector("#about-header a");

    function vidFade() {
        vid.classList.add("stopfade");
    }

    vid.addEventListener("ended", function() {
        // only functional if "loop" is removed 
        vid.pause();
        // to capture IE10
        vidFade();
    });


    pauseButton.addEventListener("click", function() {
        vid.classList.toggle("stopfade");
        if (vid.paused) {
            vid.play();
            pauseButton.innerHTML = "";
        } else {
            vid.pause();
            pauseButton.innerHTML = "";
        }
    })
    $(document).ready(function() {
        var icon = $(".play");
        icon.click(function() {
            icon.toggleClass("active");
            return false;
        });
    });
    </script>', 'category' => '0', 'type' => 'page', 'image' => 'stipino_500x500.jpg'));
		
    }
}

class BlitzPostSeeder extends Seeder
{

	public function run()
	{
		BlitzPost::create(array('title' => 'Ovo je prvi blitzpost', 'permalink' => 'ovo-je-prvi-blitzpost', 'intro' => 'Ovo je uvod za prvi blitzpost', 'type' => 'blitzpost', 'published' => '1'));
		BlitzPost::create(array('title' => 'Ovo je drugi blitzpost', 'permalink' => 'ovo-je-drugi-blitzpost', 'intro' => 'Ovo je uvod za drugi blitzpost', 'type' => 'blitzpost', 'published' => '1'));
		BlitzPost::create(array('title' => 'Ovo je treci blitzpost', 'permalink' => 'ovo-je-treci-blitzpost', 'intro' => 'Ovo je uvod za treci blitzpost', 'type' => 'blitzpost', 'published' => '1'));
	
	}
}
