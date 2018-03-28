<?php

use Illuminate\Database\Seeder;

class TiendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tiendas')->insert([
            'nombre'=> 'Liverpool',
			'url'=> 'https://www.liverpool.com.mx',
			'urlbusqueda'=> 'https://www.liverpool.com.mx/tienda/?s=',
			'selectenlace'=> '.product-name',
			'selectitem'=> '.product-cell',
			'selectnombre'=> '.product-name',
			'selectimagen'=> '.product-thumb',
			'attrimagen'=> 'data-original',
			'selectprecio'=> '.precio-especial .price-amount',
            'selectprecio_especial'=>'.precio-promocion .price-amount',
			'selectvaloracion'=> '',
            'selectdesc'=>'#intro'
        ]);


        DB::table('tiendas')->insert([
            'nombre'=> 'Palacio de hierro',
            'url'=> 'https://www.elpalaciodehierro.com',
            'urlbusqueda'=> 'https://www.elpalaciodehierro.com/catalogsearch/result/?q=',
            'selectenlace'=> '.enlace-mobile',
            'selectitem'=> '.ls-grid-item',
            'selectnombre'=> '.jbb-list-item-description',
            'selectimagen'=> '.product-image img',
            'attrimagen'=> 'data-src',
            'selectprecio'=> '.price-box .price',
            'selectprecio_especial'=>'.ls-price-now-price.price',
            'selectvaloracion'=> '',
            'selectdesc'=>'.std'
        ]);




        DB::table('categorias')->insert([
            'nombre'=> 'Mascotas',
            'slug'=> 'mascotas',
        ]);
        DB::table('categorias')->insert([
            'nombre'=> 'Casa y jardín',
            'slug'=> 'casa-y-jardin',
        ]);
        DB::table('categorias')->insert([
            'nombre'=> 'Electrónica',
            'slug'=> 'electronica',
        ]);
        DB::table('categorias')->insert([
            'nombre'=> 'Videojuegos',
            'slug'=> 'videojuegos',
        ]);
        DB::table('categorias')->insert([
            'nombre'=> 'Vestidos',
            'slug'=> 'vestidos',
        ]);




        DB::table('tendencias')->insert([
            'nombre'=> 'xbox',
        ]);
        DB::table('tendencias')->insert([
            'nombre'=> 'iphone',
        ]);



        DB::table('tops')->insert([
            'nombre'=> 'Consola Xbox One X 1 TB',
            'enlace'=> 'https://www.liverpool.com.mx/tienda/pdp/consola-xbox-one-x-1-tb/1063763108?s=xbox&skuId=1063763108',
            'tienda_id'=> 1,
            'precio'=> '1106910',
            'descripcion'=> 'Los juegos son mejores en Xbox One X. Con 40 % más de potencia que cualquier otra consola, disfruta de los juegos en un verdadero 4K envolvente. Los grandes títulos de lanzamiento tienen un aspecto genial, funcionan sin problemas y cargan rápido, y puedes llevar todos tus juegos y accesorios de Xbox One contigo',
            'imagen'=> 'https://ss423.liverpool.com.mx/lg/1063763108.jpg',
            'orden'=> 1
        ]);

    }
}
