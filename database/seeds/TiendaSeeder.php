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
            'productattrimagen'=> 'src',
            'productgaleria'=>'#listBeforeEtalage',
            'productpoplet'=>'.grid-container div div div div div ul li img',
            'productdesc'=>'#intro p',
        ]);


        DB::table('tiendas')->insert([
            'nombre'=> 'Palacio de Hierro',
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
            'productattrimagen'=> 'src',
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
            'productattrimagen'=> 'src',
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
            'productattrimagen'=> 'src',
            'productgaleria'=>'.image-carousel-wrapper',
            'productpoplet'=>'.carousel-trigger img',
            'productdesc'=>'.descriptionContainer',
        ]);

        /*DB::table('tiendas')->insert([
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
        ]);*/
        DB::table('tiendas')->insert([
            'nombre'=> 'Sanborns',
            'url'=> 'http://www.sanborns.com.mx',
            'urlbusqueda'=> 'http://buscador.sanborns.com.mx/search?client=Sanborns&output=xml_no_dtd&proxystylesheet=Sanborns&sort=date:D:L:d1&oe=UTF-8&ie=UTF-8&ud=1&exclude_apps=1&site=Sanborns&ulang=es&access=p&entqr=3&entqrm=0&filter=0&getfields=*&q=',
            'selectenlace'=> 'a[ctype="c"]',
            'selectitem'=> 'table',
            'selectnombre'=> '.Pay_pal',
            'selectimagen'=> 'a[ctype="c"] img',
            'attrimagen'=> 'src',
            'selectprecio'=> '.Pay_pal1',
            'selectprecio_especial'=>'.Pay_pal1',
            'selectvaloracion'=> '',
            'selectdesc'=>'#verCompleto',
            'productnombre'=>'.productMainTitle h1',
            'productprecio'=>'.total',
            'productprecioespecial'=>'.total',
            'productimagen'=>'.producto_imagen a img',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.bx-slide',
            'productpoplet'=>'.outborder img',
            'productdesc'=>'#verCompleto',
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'Sears',
            'url'=> 'http://www.sears.com.mx',
            'urlbusqueda'=> 'http://www.sears.com.mx/buscar/?c=',
            'selectenlace'=> '.producto_nombre',
            'selectitem'=> '.caja_producto',
            'selectnombre'=> '.producto_nombre',
            'selectimagen'=> '.foto',
            'attrimagen'=> 'style',
            'selectprecio'=> '.producto_precio',
            'selectprecio_especial'=>'.producto_precio',
            'selectvaloracion'=> '',
            'selectdesc'=>'.descripcion_larga',
            'productnombre'=>'.col_producto_oracle h1',
            'productprecio'=>'.precio',
            'productprecioespecial'=>'.precio',
            'productimagen'=>'.foto_enlace img',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.fotitos',
            'productpoplet'=>'.fotito',
            'productdesc'=>'.descripcion_larga',
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'Coppel',
            'url'=> 'https://www.coppel.com',
            'urlbusqueda'=> 'https://www.coppel.com/SearchDisplay?categoryId=&storeId=12759&catalogId=10001&langId=-5&sType=SimpleSearch&resultCatEntryType=2&showResultsPage=true&searchSource=Q&pageView=&beginIndex=0&pageSize=18&searchTerm=',
            'selectenlace'=> '.product_name a',
            'selectitem'=> '.product',
            'selectnombre'=> '.product_name h2',
            'selectimagen'=> '.image a img',
            'attrimagen'=> 'data-original',
            'selectprecio'=> '.pcontado span[itemprop="price"]',
            'selectprecio_especial'=>'.pcontado span[itemprop="price"]',
            'selectvaloracion'=> '',
            'selectdesc'=>'#desc p',
            'productnombre'=>'.main_header',
            'productprecio'=>'.pcontado',
            'productprecioespecial'=>'.pcontado',
            'productimagen'=>'.image_container img',
            'productattrimagen'=> 'src',
            'productgaleria'=>'#ProductAngleImagesAreaList',
            'productpoplet'=>'#ProductAngleImagesAreaList li a img',
            'productdesc'=>'#desc p',
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'Elektra',
            'url'=> 'https://www.elektra.com.mx',
            'urlbusqueda'=> 'https://www.elektra.com.mx/',
            'selectenlace'=> '.j-procut-item a',
            'selectitem'=> '.j-procut-item',
            'selectnombre'=> '.product-name',
            'selectimagen'=> '.product-image img',
            'attrimagen'=> 'src',
            'selectprecio'=> '.price-new',
            'selectprecio_especial'=>'.price-new',
            'selectvaloracion'=> '',
            'selectdesc'=>'.productDescription',
            'productnombre'=>'.productName',
            'productprecio'=>'.skuBestPrice',
            'productprecioespecial'=>'.skuBestPrice',
            'productimagen'=>'.image_container img',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.slick-track',
            'productpoplet'=>'.product-detail__gallery-picture',
            'productdesc'=>'.productDescription',
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'Chedraui',
            'url'=> 'https://www.chedraui.com.mx',
            'urlbusqueda'=> 'https://www.chedraui.com.mx/search/?text=',
            'selectenlace'=> '.product__list--name',
            'selectitem'=> '.product__list--item',
            'selectnombre'=> '.product__list--name',
            'selectimagen'=> '.plp-product-thumb img',
            'attrimagen'=> 'src',
            'selectprecio'=> '.product__listing--price',
            'selectprecio_especial'=>'.product__listing--price',
            'selectvaloracion'=> '',
            'selectdesc'=>'.tab-details p',
            'productnombre'=>'.name',
            'productprecio'=>'.price',
            'productprecioespecial'=>'.price',
            'productimagen'=>'.image_container img',
            'productattrimagen'=> 'data-src',
            'productgaleria'=>'.image-gallery.js-gallery',
            'productpoplet'=>'.image-gallery__image .item div img',
            'productdesc'=>'.tab-details p',
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'Costco',
            'url'=> 'https://www.costco.com.mx',
            'urlbusqueda'=> 'https://www.costco.com.mx/view/search?sort=score&search=',
            'selectenlace'=> '.productList_name a',
            'selectitem'=> '.productList_item',
            'selectnombre'=> '.productList_name',
            'selectimagen'=> '.productList_a img',
            'attrimagen'=> 'src',
            'selectprecio'=> '.price.bold a',
            'selectprecio_especial'=>'.price.bold a',
            'selectvaloracion'=> '',
            'selectdesc'=>'#productDetail_tab2 p',
            'productnombre'=>'.productDetail_name_and_description.mt30 h1',
            'productprecio'=>'.productdetail_inclprice',
            'productprecioespecial'=>'.productdetail_inclprice',
            'productimagen'=>'.ql_product_picture a img',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.ql_product_thumbnails.cf',
            'productpoplet'=>'.ql_product_thumbnail left a img',
            'productdesc'=>'#productDetail_tab2 p',
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'Soriana',
            'url'=> 'https://www.soriana.com',
            'urlbusqueda'=> 'https://www.soriana.com/soriana/es/search/?text=',
            'selectenlace'=> '.product-item a',
            'selectitem'=> '.product-item',
            'selectnombre'=> '.product-productNameCont',
            'selectimagen'=> '.product-item a img',
            'attrimagen'=> 'src',
            'selectprecio'=> '.priceContainer .price',
            'selectprecio_especial'=>'.sale-price',
            'selectvaloracion'=> '',
            'selectdesc'=>'.tab-details',
            'productnombre'=>'.name',
            'productprecio'=>'.priceContainer',
            'productprecioespecial'=>'.sale-price .price',
            'productimagen'=>'.zoomImages img',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.jcarousel-list.jcarousel-list-vertical',
            'productpoplet'=>'.jcarousel-item.jcarousel-item-vertical.jcarousel-item-2.jcarousel-item-2-vertical img',
            'productdesc'=>'.tab-details',
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'OfficeMax',
            'url'=> 'https://www.officemax.com.mx',
            'urlbusqueda'=> 'https://www.officemax.com.mx/',
            'selectenlace'=> '.contenedor-img',
            'selectitem'=> '.product-item-wrapper',
            'selectnombre'=> '.product-caption a h5',
            'selectimagen'=> '.contenedor-img img',
            'attrimagen'=> 'src',
            'selectprecio'=> '.price-new',
            'selectprecio_especial'=>'.price-new',
            'selectvaloracion'=> '',
            'selectdesc'=>'.productDescription',
            'productnombre'=>'.productName',
            'productprecio'=>'.skuBestPrice',
            'productprecioespecial'=>'.skuBestPrice',
            'productimagen'=>'#image a img',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.thumbs',
            'productpoplet'=>'.thumbs li a img',
            'productdesc'=>'.productDescription',
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
