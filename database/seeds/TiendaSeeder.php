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
            'selectdesc'=>'#intro p',
            'productnombre'=>'#productName h1',
            'productprecio'=>'#price .precio-promocion span',
            'productprecioespecial'=>'#price .precio-promocion span',
            'productimagen'=>'#img-viewer',
            'productgaleria'=>'#listBeforeEtalage',
            'productpoplet'=>'li img',
            'productdesc'=>'#intro p',
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
            'selectdesc'=>'.std',
            'productnombre'=>'.product-name',
            'productprecio'=>'.price',
            'productprecioespecial'=>'.ls-price-now-price',
            'productimagen'=>'#image',
            'productgaleria'=>'.slider',
            'productpoplet'=>'.iwd_product_image_thumbnail img',
            'productdesc'=>'.std',
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'Amazon',
            'url'=> 'https://www.amazon.com.mx',
            'urlbusqueda'=> 'https://www.amazon.com.mx/s/ref=nb_sb_noss?__mk_es_MX=ÅMÅŽÕÑ&url=search-alias%3Daps&field-keywords=',
            'selectenlace'=> '.a-link-normal.s-access-detail-page.s-color-twister-title-link.a-text-normal',
            'selectitem'=> '.s-result-item',
            'selectnombre'=> '.a-size-medium.s-inline.s-access-title.a-text-normal',
            'selectimagen'=> '.s-access-image',
            'attrimagen'=> 'src',
            'selectprecio'=> '.a-size-base.a-color-price.s-price.a-text-bold',
            'selectprecio_especial'=>'.a-size-base.a-color-price.s-price.a-text-bold',
            'selectvaloracion'=> '',
            'selectdesc'=>'#featurebullets_feature_div',
            'productnombre'=>'#productTitle',
            'productprecio'=>'#priceblock_ourprice',
            'productprecioespecial'=>'#priceblock_ourprice',
            'productimagen'=>'#imgTagWrapperId img',
            'productgaleria'=>'#altImages',
            'productpoplet'=>'.a-spacing-small .a-button-text img',
            'productdesc'=>'#featurebullets_feature_div',
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'Best Buy',
            'url'=> 'https://www.bestbuy.com.mx',
            'urlbusqueda'=> 'https://www.bestbuy.com.mx/c/buscar-best-buy/buscar?query=',
            'selectenlace'=> '.product-title a',
            'selectitem'=> '.product-line-item-line',
            'selectnombre'=> '.product-title',
            'selectimagen'=> '.product-image',
            'attrimagen'=> 'src',
            'selectprecio'=> '.product-price',
            'selectprecio_especial'=>'.product-price',
            'selectvaloracion'=> '',
            'selectdesc'=>'.descriptionContainer',
            'productnombre'=>'#sku-title',
            'productprecio'=>'.pb-purchase-price',
            'productprecioespecial'=>'.pb-purchase-price',
            'productimagen'=>'.primary-image',
            'productgaleria'=>'.image-carousel-wrapper',
            'productpoplet'=>'.carousel-trigger img',
            'productdesc'=>'.descriptionContainer',
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'Mercadolibre',
            'url'=> 'https://mercadolibre.com.mx/',
            'urlbusqueda'=> 'https://listado.mercadolibre.com.mx/',
            'selectenlace'=> '.item__info-title',
            'selectitem'=> '.results-item.article.article-pad.stack ',
            'selectnombre'=> '.item__info-title',
            'selectimagen'=> '.lazy-load',
            'attrimagen'=> 'src',
            'selectprecio'=> '.price__fraction',
            'selectprecio_especial'=>'.price__fraction',
            'selectvaloracion'=> '',
            'selectdesc'=>'.item-description__text',
            'productnombre'=>'.item-title__primary',
            'productprecio'=>'.price-tag-fraction',
            'productprecioespecial'=>'.price-tag-fraction',
            'productimagen'=>'.primary-image',
            'productgaleria'=>'.gallery-trigger.ch-zoom-trigger.ch-shownby-pointerenter img',
            'productpoplet'=>'.gallery-trigger.ch-zoom-trigger.ch-shownby-pointerenter img',
            'productdesc'=>'.item-description__text',
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


        DB::table('ads')->insert([
            'imagen'=> 'ad1.jpg',
            'lugar'=> 'inicio'
        ]);

    }
}
