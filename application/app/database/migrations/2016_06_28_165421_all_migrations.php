<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllMigrations extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create languages
		Schema::create('languages', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('iso_tag')->unique();
			$table->string('language');
			$table->string('local_name');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
		
		});

		// Create cart
		Schema::create('cart', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('token')->unique();
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			
		});
		// Create cart_items
		Schema::create('cart_items', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('cart_id');
			$table->integer('product_id');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			
		});

		// Create orders
		Schema::create('orders', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('order_id');
			$table->integer('user_id');
			$table->float('price');
			$table->string('shipping_way');
			$table->string('payment_way');
			$table->string('payment_status');
			$table->string('shipping_address');
			$table->string('billing_address');
			$table->text('note');
			$table->date('order_date');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->softDeletes();
		});


        // Create interactions
		Schema::create('interactions', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('user_id');
			$table->string('order_id');
			$table->string('type');
			$table->float('price');
			$table->text('note');
			$table->text('message');
			$table->date('order_date');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->softDeletes();
		});

		// Create orders_products
		Schema::create('orders_products', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('order_id');
			$table->integer('product_id');
			$table->integer('quantity');
			$table->float('price');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->softDeletes();
		});


		Schema::create('product_weight', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('title', 255);
			$table->integer('product_weight');
			$table->string('measure_unit', 50);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->softDeletes();
		});


		Schema::create('workshops', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('title', 255);
			$table->string('permalink');
			$table->string('description');
			$table->string('image');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->softDeletes();
		});

		Schema::create('product_posts', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('product_id');
			$table->integer('blog_id');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->softDeletes();
		});

		// Create products
		Schema::create('products', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('title', 255);
			$table->string('permalink', 255);
			$table->integer('product_weight');
			$table->text('intro');
			$table->text('description');
			$table->decimal('price', 10,2);
			$table->decimal('sale_price', 10,2)->nullable();
			$table->decimal('manufacturing_price', 10,2);
			$table->integer('onsale')->nullable();
			$table->integer('onstock');
			$table->integer('published');
			$table->string('image', 255);
			$table->string('cover_image', 255);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->softDeletes();
		});


		// Create users
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('first_name', 50);
			$table->string('last_name', 50);
			$table->integer('type');
			$table->integer('oib');
			$table->string('block', 50);
			$table->string('contact_person', 50);
			$table->string('phone', 50);
			$table->string('additional_phone', 50);
			$table->text('note');
			$table->string('permalink', 255);
			$table->string('username', 30);
			$table->string('user_group', 50);
			$table->string('email', 50);
			$table->string('additional_email', 50);
			$table->string('password', 100);
			$table->string('address', 255);
			$table->string('area', 255);
			$table->integer('city');
			$table->integer('region');
			$table->string('date_of_birth', 50);
			$table->string('remember_token', 255);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->softDeletes();
		});


		// Password reminders
		Schema::create('password_reminders', function(Blueprint $table)
		{
			$table->string('email')->index();
			$table->string('token')->index();
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
		});

		/*	**********************
			Migrations for Entrust
			**********************	*/

		// Creates the roles table
		Schema::create('roles', function ($table) {
			$table->increments('id')->unsigned();
			$table->string('name')->unique();
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
		});

		// Creates the assigned_roles (Many-to-Many relation) table
		Schema::create('assigned_roles', function ($table) {
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('role_id')->unsigned();
			$table->dateTime('created_at');
			$table->dateTime('updated_at');

			$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('role_id')->references('id')->on('roles');
		});

		// Creates the permissions table
		Schema::create('permissions', function ($table) {
			$table->increments('id')->unsigned();
			$table->string('name')->unique();
			$table->string('display_name');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
		});



		// Creates the permission_role (Many-to-Many relation) table
		Schema::create('permission_role', function ($table) {
			$table->increments('id')->unsigned();
			$table->integer('permission_id')->unsigned();
			$table->integer('role_id')->unsigned();

			$table->foreign('permission_id')->references('id')->on('permissions'); // assumes a users table
			$table->foreign('role_id')->references('id')->on('roles');
		});


		Schema::create('cms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 255);
			$table->string('permalink', 255);
			$table->text('intro');
			$table->text('content');
			$table->integer('category');
			$table->string('type', 20);
			$table->integer('published');
			$table->string('image', 255);
			$table->date('workshop_date')->nullable();
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->softDeletes();
		});

		Schema::create('media', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('permalink', 255);
			$table->string('image', 255);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->softDeletes();
		});

		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 150);
			$table->string('permalink', 255);
			$table->string('image', 255);
			$table->string('category_type', 255);
			$table->string('description', 255);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->softDeletes();
		});

	 
		// Creates the products_categories (Many-to-Many relation) table
		Schema::create('products_categories', function ($table) {
			$table->increments('id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
			$table->foreign('product_id')->references('id')->on('products');
			$table->foreign('category_id')->references('id')->on('categories');
			$table->softDeletes();
		});

		Schema::create('city', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50);
			$table->integer('zip')->unsigned();
			$table->string('permalink', 255);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
		});

		Schema::create('region', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50);
			$table->string('permalink', 255);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
		});

		// Create Areas
		Schema::create('area', function($table)
		{
			$table->increments('id');
			$table->string('name', 50);
			$table->integer('city');
			$table->string('permalink', 255);
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
 		Schema::drop('languages');
 		Schema::drop('products');
		Schema::drop('users');
		Schema::drop('password_reminders');
		Schema::drop('assigned_roles');
		Schema::drop('permission_role');
		Schema::drop('cms');
		Schema::drop('orders');
		Schema::drop('orders_products');
		Schema::drop('media');
		Schema::drop('categories'); 
		Schema::drop('roles');
		Schema::drop('permissions');
		Schema::drop('city');
		Schema::drop('region');
		Schema::drop('area');
		Schema::drop('product_weight');
	}

}
