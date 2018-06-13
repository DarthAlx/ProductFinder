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
            'created_at' => date("Y-m-d H:i:s")
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
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'Amazon',
            'url'=> 'https://www.amazon.com.mx',
            'urlbusqueda'=> 'https://www.amazon.com.mx/s/ref=nb_sb_noss?__mk_es_MX=ÅMÅŽÕÑ&url=search-alias%3Daps&field-keywords=',
            'selectenlace'=> '.a-link-normal.s-access-detail-page.s-color-twister-title-link.a-text-normal',
            'selectitem'=> '.s-result-item',
            'selectnombre'=> '.a-link-normal.s-access-detail-page.s-color-twister-title-link.a-text-normal',
            'selectimagen'=> '.s-access-image',
            'attrimagen'=> 'src',
            'selectprecio'=> '.a-size-base.a-color-price.s-price.a-text-bold',
            'selectprecio_especial'=>'.a-size-base.a-color-price.a-text-bold',
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
            'created_at' => date("Y-m-d H:i:s")
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
            'created_at' => date("Y-m-d H:i:s")
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
            'urlbusqueda'=> 'https://www.sanborns.com.mx/buscador/',
            'selectenlace'=> '.descrip',
            'selectitem'=> '.productbox',
            'selectnombre'=> '.descrip p',
            'selectimagen'=> '.contImgProd img',
            'attrimagen'=> 'src',
            'selectprecio'=> '.preciodesc',
            'selectprecio_especial'=>'.preciodesc',
            'selectvaloracion'=> '',
            'selectdesc'=>'#verCompleto',
            'productnombre'=>'.productMainTitle h1',
            'productprecio'=>'.total',
            'productprecioespecial'=>'.total',
            'productimagen'=>'.carrusel-producto li img',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.nada',
            'productpoplet'=>'.nada',
            'productdesc'=>'#verCompleto',
            'created_at' => date("Y-m-d H:i:s")
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
            'created_at' => date("Y-m-d H:i:s")
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
            'created_at' => date("Y-m-d H:i:s")
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
            'created_at' => date("Y-m-d H:i:s")
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
            'created_at' => date("Y-m-d H:i:s")
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
            'created_at' => date("Y-m-d H:i:s")
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
            'created_at' => date("Y-m-d H:i:s")
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
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'OfficeDepot',
            'url'=> 'https://www.officedepot.com.mx',
            'urlbusqueda'=> 'https://www.officedepot.com.mx/officedepot/en/search/?text=',
            'selectenlace'=> '.name.description-style',
            'selectitem'=> '.product-item',
            'selectnombre'=> '.name.description-style',
            'selectimagen'=> '.thumb img',
            'attrimagen'=> 'src',
            'selectprecio'=> '.price',
            'selectprecio_especial'=>'.discountedPrice-grid',
            'selectvaloracion'=> '',
            'selectdesc'=>'#prfLongDescription',
            'productnombre'=>'.p-name',
            'productprecio'=>'.big-price .priceData',
            'productprecioespecial'=>'.big-price .priceData',
            'productimagen'=>'#image a img',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.image-gallery',
            'productpoplet'=>'.u-photo',
            'productdesc'=>'#prfLongDescription',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'Linio',
            'url'=> 'https://www.linio.com.mx',
            'urlbusqueda'=> 'https://www.linio.com.mx/search?q=',
            'selectenlace'=> '.detail-container p a',
            'selectitem'=> '.catalogue-product',
            'selectnombre'=> '.detail-container p',
            'selectimagen'=> '.image-container a figure picture img',
            'attrimagen'=> 'data-lazy',
            'selectprecio'=> '.price-secondary',
            'selectprecio_especial'=>'.price-secondary',
            'selectvaloracion'=> '',
            'selectdesc'=>'.product-feature',
            'productnombre'=>'.product-title h1',
            'productprecio'=>'.price-main',
            'productprecioespecial'=>'.price-main',
            'productimagen'=>'#image-product figure img',
            'productattrimagen'=> 'data-lazy',
            'productgaleria'=>'.gallery-container',
            'productpoplet'=>'.gallery-container .product-image img',
            'productdesc'=>'.product-feature',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'Ebay',
            'url'=> 'https://www.ebay.com',
            'urlbusqueda'=> 'https://www.ebay.com/sch/i.html?_from=R40&_trksid=p2050601.m570.l1313.TR0.TRC0.H0.Xxbox.TRS0&_nkw=',
            'selectenlace'=> '.lvtitle a',
            'selectitem'=> '#ListViewInner li',
            'selectnombre'=> '.lvtitle',
            'selectimagen'=> '.lvpicinner a img',
            'attrimagen'=> 'src',
            'selectprecio'=> '.lvprice.prc .bold',
            'selectprecio_especial'=>'.lvprice.prc .bold',
            'selectvaloracion'=> '',
            'selectdesc'=>'#desc_div p',
            'productnombre'=>'#vi-lkhdr-itmTitl',
            'productprecio'=>'#convbinPrice',
            'productprecioespecial'=>'#convbinPrice',
            'productimagen'=>'#icImg',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.lst.icon',
            'productpoplet'=>'.tdThumb img',
            'productdesc'=>'#desc_div p',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        /*DB::table('tiendas')->insert([
            'nombre'=> 'Porrua',
            'url'=> 'https://www.porrua.mx',
            'urlbusqueda'=> 'https://www.porrua.mx/busqueda/todos/',
            'selectenlace'=> 'a',
            'selectitem'=> '.col-md-3.col-sm-4',
            'selectnombre'=> 'h5',
            'selectimagen'=> 'img',
            'attrimagen'=> 'src',
            'selectprecio'=> 'h5 strong',
            'selectprecio_especial'=>'h5 strong',
            'selectvaloracion'=> '',
            'selectdesc'=>'.panel-body col-md-12.col-sm-12.text-justify.text-muted',
            'productnombre'=>'.col-md-4.col-sm-4.text-left strong',
            'productprecio'=>'.comprar_precio strong',
            'productprecioespecial'=>'.comprar_precio strong',
            'productimagen'=>'.fancybox img',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.none',
            'productpoplet'=>'.none',
            'productdesc'=>'.panel-body col-md-12.col-sm-12.text-justify.text-muted',
            'created_at' => date("Y-m-d H:i:s")
        ]);*/


        /*DB::table('tiendas')->insert([
            'nombre'=> 'La casa del libro',
            'url'=> 'https://latam.casadellibro.com',
            'urlbusqueda'=> 'https://latam.casadellibro.com/busqueda-generica?busqueda=',
            'selectenlace'=> '.title-link',
            'selectitem'=> '.mod-list-item',
            'selectnombre'=> '.title-link',
            'selectimagen'=> '.product-item span img',
            'attrimagen'=> 'data-src',
            'selectprecio'=> '.priceOriginal',
            'selectprecio_especial'=>'.priceOriginal',
            'selectvaloracion'=> '',
            'selectdesc'=>'.acortar',
            'productnombre'=>'.book-header-2-title',
            'productprecio'=>'.priceOriginal',
            'productprecioespecial'=>'.priceOriginal',
            'productimagen'=>'#imgPrincipal',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.none',
            'productpoplet'=>'.none',
            'productdesc'=>'.acortar',
            'created_at' => date("Y-m-d H:i:s")
        ]);*/

        /*DB::table('tiendas')->insert([
            'nombre'=> 'Gandhi',
            'url'=> 'http://gandhi.com.mx',
            'urlbusqueda'=> 'http://busqueda.gandhi.com.mx/busca?q=',
            'selectenlace'=> '.product-name a',
            'selectitem'=> '.item',
            'selectnombre'=> '.product-name',
            'selectimagen'=> '.product-image img',
            'attrimagen'=> 'src',
            'selectprecio'=> '.price',
            'selectprecio_especial'=>'.special-price .price',
            'selectvaloracion'=> '',
            'selectdesc'=>'.short-description.std',
            'productnombre'=>'.product-name',
            'productprecio'=>'.price',
            'productprecioespecial'=>'.special-price .price',
            'productimagen'=>'.product-img-box',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.none',
            'productpoplet'=>'.none',
            'productdesc'=>'.short-description.std',
            'created_at' => date("Y-m-d H:i:s")
        ]);*/

        DB::table('tiendas')->insert([
            'nombre'=> 'Sunglass Hut',
            'url'=> 'http://www.sunglasshut.com',
            'urlbusqueda'=> 'http://www.sunglasshut.com/mx/search/',
            'selectenlace'=> '.shelf-url',
            'selectitem'=> '.box-product',
            'selectnombre'=> '.shelf-item-name',
            'selectimagen'=> '.image img',
            'attrimagen'=> 'src',
            'selectprecio'=> '.bestPrice .val',
            'selectprecio_especial'=>'.bestPrice .val',
            'selectvaloracion'=> '',
            'selectdesc'=>'.align-info',
            'productnombre'=>'.nameProduct',
            'productprecio'=>'.bestPrice .val',
            'productprecioespecial'=>'.bestPrice .val',
            'productimagen'=>'.showcase-image img',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.none',
            'productpoplet'=>'.none',
            'productdesc'=>'.align-info',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        /*DB::table('tiendas')->insert([
            'nombre'=> 'Dormimundo',
            'url'=> 'http://dormimundo.com.mx',
            'urlbusqueda'=> 'http://dormimundo.com.mx/catalogsearch/result/?q=',
            'selectenlace'=> '.product-name a',
            'selectitem'=> '.item',
            'selectnombre'=> '.product-name',
            'selectimagen'=> '.product-image img',
            'attrimagen'=> 'src',
            'selectprecio'=> '.regular-price .price',
            'selectprecio_especial'=>'.regular-price .price',
            'selectvaloracion'=> '',
            'selectdesc'=>'.short-description',
            'productnombre'=>'.product-name',
            'productprecio'=>'.regular-price .price',
            'productprecioespecial'=>'.regular-price .price',
            'productimagen'=>'#image-main',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.none',
            'productpoplet'=>'.none',
            'productdesc'=>'.short-description',
            'created_at' => date("Y-m-d H:i:s")
        ]);*/

        DB::table('tiendas')->insert([
            'nombre'=> 'Claroshop',
            'url'=> 'https://www.claroshop.com',
            'urlbusqueda'=> 'https://www.claroshop.com/buscador/',
            'selectenlace'=> '.descrip',
            'selectitem'=> '.productbox',
            'selectnombre'=> '.descrip p',
            'selectimagen'=> '.contImgProd img',
            'attrimagen'=> 'data-src',
            'selectprecio'=> '.preciodesc',
            'selectprecio_especial'=>'.preciodesc',
            'selectvaloracion'=> '',
            'selectdesc'=>'#verCompleto',
            'productnombre'=>'.productMainTitle h1',
            'productprecio'=>'.total',
            'productprecioespecial'=>'.total',
            'productimagen'=>'.carrusel-producto li img',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.nada',
            'productpoplet'=>'.nada',
            'productdesc'=>'#verCompleto',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'Radioshack',
            'url'=> 'https://www.radioshack.com.mx',
            'urlbusqueda'=> 'https://www.radioshack.com.mx/store/radioshack/en/search/?text=',
            'selectenlace'=> '.name',
            'selectitem'=> '.product-item',
            'selectnombre'=> '.name',
            'selectimagen'=> '.thumb img',
            'attrimagen'=> 'src',
            'selectprecio'=> '.price div',
            'selectprecio_especial'=>'.price div',
            'selectvaloracion'=> '',
            'selectdesc'=>'#parrafo p',
            'productnombre'=>'.p-name',
            'productprecio'=>'#priceFormato',
            'productprecioespecial'=>'#priceFormato',
            'productimagen'=>'.carousel .item img',
            'productattrimagen'=> 'data-src',
            'productgaleria'=>'.nada',
            'productpoplet'=>'.nada',
            'productdesc'=>'#parrafo p',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        /*DB::table('tiendas')->insert([
            'nombre'=> 'AT&T',
            'url'=> 'https://www.att.com.mx',
            'urlbusqueda'=> 'https://www.att.com.mx/tienda/catalogsearch/result/?q=',
            'selectenlace'=> '.product-name a',
            'selectitem'=> '.item',
            'selectnombre'=> '.product-name',
            'selectimagen'=> '.product-image img',
            'attrimagen'=> 'src',
            'selectprecio'=> '.regular-price .price',
            'selectprecio_especial'=>'.regular-price .price',
            'selectvaloracion'=> '',
            'selectdesc'=>'.std',
            'productnombre'=>'.product-name h1',
            'productprecio'=>'.regular-price .price',
            'productprecioespecial'=>'.regular-price .price',
            'productimagen'=>'.product-image-gallery img',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.nada',
            'productpoplet'=>'.nada',
            'productdesc'=>'.std',
            'created_at' => date("Y-m-d H:i:s")
        ]);*/

        DB::table('tiendas')->insert([
            'nombre'=> 'Steren',
            'url'=> 'http://www.steren.com.mx',
            'urlbusqueda'=> 'http://www.steren.com.mx/catalogsearch/result/?q=',
            'selectenlace'=> '.product-info a',
            'selectitem'=> '.item',
            'selectnombre'=> '.product-name',
            'selectimagen'=> '.product-image img',
            'attrimagen'=> 'src',
            'selectprecio'=> '.regular-price .price',
            'selectprecio_especial'=>'.regular-price .price',
            'selectvaloracion'=> '',
            'selectdesc'=>'.tab-container .tab-content .std',
            'productnombre'=>'.product-name',
            'productprecio'=>'.regular-price .price',
            'productprecioespecial'=>'.regular-price .price',
            'productimagen'=>'.product-image-gallery img',
            'productattrimagen'=> 'src',
            'productgaleria'=>'.nada',
            'productpoplet'=>'.nada',
            'productdesc'=>'.tab-container .tab-content .std',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('tiendas')->insert([
            'nombre'=> 'HP',
            'url'=> 'https://www.hponline.com.mx',
            'urlbusqueda'=> 'https://www.hponline.com.mx/search?q=',
            'selectenlace'=> '.title-section',
            'selectitem'=> '.catalogue-product',
            'selectnombre'=> '.title-section',
            'selectimagen'=> '.image-container a figure picture img',
            'attrimagen'=> 'data-lazy',
            'selectprecio'=> '.price-secondary',
            'selectprecio_especial'=>'.price-secondary',
            'selectvaloracion'=> '',
            'selectdesc'=>'#textoDescripcionGeneral',
            'productnombre'=>'.product-title h1',
            'productprecio'=>'.price-main',
            'productprecioespecial'=>'.price-main',
            'productimagen'=>'#image-product figure img',
            'productattrimagen'=> 'data-lazy',
            'productgaleria'=>'.nada',
            'productpoplet'=>'.nada',
            'productdesc'=>'#textoDescripcionGeneral',
            'created_at' => date("Y-m-d H:i:s")
        ]);



        DB::table('categorias')->insert([
            'nombre'=> 'Mascotas',
            'slug'=> 'mascotas',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('categorias')->insert([
            'nombre'=> 'Casa y jardín',
            'slug'=> 'casa-y-jardin',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('categorias')->insert([
            'nombre'=> 'Electrónica',
            'slug'=> 'electronica',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('categorias')->insert([
            'nombre'=> 'Videojuegos',
            'slug'=> 'videojuegos',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('categorias')->insert([
            'nombre'=> 'Vestidos',
            'slug'=> 'vestidos',
            'created_at' => date("Y-m-d H:i:s")
        ]);




        DB::table('busquedas')->insert([
            'keywords'=> 'xbox',
            'contador'=>1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('busquedas')->insert([
            'keywords'=> 'iPhone 8 256 GB',
            'contador'=>1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('busquedas')->insert([
            'keywords'=> 'Jersey Selección Mexicana',
            'contador'=>1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('busquedas')->insert([
            'keywords'=> 'PES 2018',
            'contador'=>1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('busquedas')->insert([
            'keywords'=> 'Lenovo Moto G5',
            'contador'=>1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('busquedas')->insert([
            'keywords'=> 'GoPro Hero 5',
            'contador'=>1,
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('busquedas')->insert([
            'keywords'=> 'AirPods Apple',
            'contador'=>1,
            'created_at' => date("Y-m-d H:i:s")
        ]);



        DB::table('tops')->insert([
            'nombre'=> 'Consola Xbox One X 1 TB',
            'enlace'=> 'https://www.liverpool.com.mx/tienda/pdp/consola-xbox-one-x-1-tb/1063763108?s=xbox&skuId=1063763108',
            'tienda_id'=> 1,
            'precio'=> '1106910',
            'descripcion'=> 'Los juegos son mejores en Xbox One X. Con 40 % más de potencia que cualquier otra consola, disfruta de los juegos en un verdadero 4K envolvente. Los grandes títulos de lanzamiento tienen un aspecto genial, funcionan sin problemas y cargan rápido, y puedes llevar todos tus juegos y accesorios de Xbox One contigo',
            'imagen'=> 'https://ss423.liverpool.com.mx/lg/1063763108.jpg',
            'orden'=> 1,
            'tipo'=> 'Destacado',
            'created_at' => date("Y-m-d H:i:s")
        ]);


        DB::table('tops')->insert([
            'nombre'=> 'Consola Xbox One X 1 TB',
            'enlace'=> 'https://www.liverpool.com.mx/tienda/pdp/consola-xbox-one-x-1-tb/1063763108?s=xbox&skuId=1063763108',
            'tienda_id'=> 1,
            'precio'=> '1106910',
            'descripcion'=> 'Los juegos son mejores en Xbox One X. Con 40 % más de potencia que cualquier otra consola, disfruta de los juegos en un verdadero 4K envolvente. Los grandes títulos de lanzamiento tienen un aspecto genial, funcionan sin problemas y cargan rápido, y puedes llevar todos tus juegos y accesorios de Xbox One contigo',
            'imagen'=> 'https://ss423.liverpool.com.mx/lg/1063763108.jpg',
            'orden'=> 1,
            'tipo'=> 'Interes',
            'created_at' => date("Y-m-d H:i:s")
        ]);


        DB::table('ads')->insert([
            'imagen'=> 'ad1.jpg',
            'enlace'=> '',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('ads')->insert([
            'imagen'=> 'ad1.jpg',
            'enlace'=> '',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('ads')->insert([
            'imagen'=> 'ad1.jpg',
            'enlace'=> '',
            'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('ads')->insert([
            'imagen'=> 'ad1.jpg',
            'enlace'=> '',
            'created_at' => date("Y-m-d H:i:s")
        ]);



        DB::table('frases')->insert([
            'frase'=> ' 
            ',
            'created_at' => date("Y-m-d H:i:s")
        ]);


DB::table('frases')->insert([
            'frase'=> ' Si doblas un pedazo de papel 42 veces, alcanzaría la Luna.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Los cocos matan más personas que los tiburones al año. ',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Si estás en Detroit y caminas al sur, en realidad llegarías a Canadá.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' La probabilidad de que tomes un vaso de agua que contenga una molécula de agua que haya pasado por un DINOSAURIO es de casi 100%.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Hay más tigres en Texas que en todo el resto del mundo.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

 DB::table('frases')->insert([
            'frase'=> ' Hay menos átomos en la Tierra que maneras de barajar un puño de cartas.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Hay suficiente hierro en tu cuerpo para hacer un clavo de 3 pulgadas.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Cuando la primera cinta de Star Wars salió, Francia aún ejecutaba personas con la guillotina.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

 DB::table('frases')->insert([
            'frase'=> ' Ana Frank y Martin Luther King Jr. nacieron en el mismo año.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

 DB::table('frases')->insert([
            'frase'=> ' Shakespeare y Pocahontas vivieron durante la misma época.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Charles Darwin y Abraham Lincoln tienen el mismo día de cumpleaños.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' La pelusa que se acumula en el fondo de los bolsillos tiene un nombre en inglés — gnurr.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' La universidad de Cambridge es más vieja que el imperio Azteca.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Un millón de segundos son 11 días. Un billón de segundos son 33 años.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Cleopatra vivió más cerca de la invención del iPhone que de la construcción de la Gran Pirámide.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Cada dos minutos, tomamos más fotografías que lo que toda la humanidad tomó en el siglo 19.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Mas de 1000 pájaros mueren en un año por estrellarse contra ventanas, vidrieras, etc.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Los gatos que tienen mas de 3 colores, siempre son hembras.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' En Hong Kong, Esta permitido que la mujer mate a su esposo si este le es Infiel, pero solo con las manos.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' El látigo fue el primer objeto creado por el ser humano que rompió la barrera del sonido.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Los caracoles pueden llegar a dormir durante 3 años.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' La FIFA tiene mas países asociados que la ONU.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Unidos, todos los vasos sanguíneos de tu cuerpo harían una línea de 95.000 km.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' El hombre mas alto del mundo media 272 cm.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' El logotipo de la marca de coches alemana BMW simboliza las aspas de avión.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' El 99.9 % de las especies animales que han existido sobre la tierra se extinguieron antes de la aparición del hombre.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' El chocolate contiene phenylethylamine (PEA) sustancia natural que es la que estimula en el cuerpo la acción de enamorarse.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Cuando un niño termina la educación primaria ha visto en su corta vida 8.000 asesinatos y 10.000 actos de violencia en la televisión.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' El 70% de los norteamericanos no creen que el hombre haya llegado a la Luna.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' La base de la Gran Pirámide de Egipto equivale en tamaño a 10 campos de fútbol.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Un kilo de papas fritas cuesta 200 veces lo que vale un kilo de papa.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' La fecha en las botellas de vino es la fecha en que la uva fue cosechada, y no es la fecha en que fue embotellado tal vino. ',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' 15% de las mujeres americanas se mandan flores a si mismas en el día de los enamorados.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Si se erradicaran las enfermedades cardíacas, el cáncer y la diabetes, la expectativa de vida del hombre sería de 99.2 años.',
            'created_at' => date("Y-m-d H:i:s")
        ]);


DB::table('frases')->insert([
            'frase'=> ' Einstein nunca fue un buen alumno, y ni siquiera hablaba bien a los 9 años, sus padres creían que era retrasado mental.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Su cabello crece mas rápido durante la noche, y usted pierde en promedio 100 pelos por día.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Las caricaturas del Pato Donald fueron vetadas en Finlandia porque éste no usaba pantalón.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' 100 tazas de café tomadas en un lapso de cuatro horas, técnicamente pueden causar la muerte.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' El nombre original de Luke Skywalker era Starkiller (Asesino de estrellas), pero para que sonara menos violento se lo cambiaron.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' El ojo del avestruz es más grande que su cerebro.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Según la ley, las carreteras interestatales en Estados Unidos requieren que una milla de cada cinco sea recta. Estas secciones son útiles como pistas de aterrizaje en casos de emergencia y de guerra.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' El Pentágono tiene el doble de baños de los necesarios. Cuando se construyo, la ley requería de un baño para negros y otro para blancos.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' El corazón humano genera suficiente presión cuando bombea la sangre que podría esparcirla fuera del cuerpo hasta 10 metros de distancia.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Hace 400 años, en el ducado de Bretaña, a los borrachos les estaba permitido reincidir hasta cuatro veces antes de cortarles las orejas.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' 31 millones de mexicanos usan la red durante un periodo de 5 horas, la mitad considera la red indispensable y el 85% tiene cuenta en facebook o twitter.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Los peces duermen con los ojos abiertos en zonas oscuras de arrecifes sin moverse, y los tiburones, delfines y ballenas igual pero no dejan de nadar.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' México tiene una superficie de 1 964 375 km², por lo que es el decimocuarto país más extenso del mundo y el tercero más grande de América Latina.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' El castillo de Chapultepec es el único castillo de Realeza construido en el continente Americano.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' México es el 4to país con mayor biodiversidad en el mundo, ya que entre el 10% y el 12% de todas las especies del mundo pueden ser encontradas en nuestro territorio.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' La CDMX es la ciudad que más agua potable consume en el mundo.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' En México, según información del Instituto Nacional de Antropología e Historia (I.N.A.H.) se tienen registrados al menos 37 266 sitios arqueológicos.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Se estima que la ciudad se está hundiendo de 2 a 30 centímetros cada año. Debido a que la ciudad está sobre bases acuíferas, el terreno cede lentamente.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' El Zócalo mide 46,800 metros cuadrados, siendo la plaza más grande en una ciudad hispana. ',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' La Basílica de Guadalupe es el segundo santuario católico más visitado del mundo. Se estima que la visitan 14 millones de personas anualmente. El primero es el Vaticano.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' La primera patente para un sistema de Televisión a colores fue otorgada en 1940 al mexicano Guillermo González Camarena de 23 años de edad.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' México es el  mayor productor  de plata en el mundo.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' La Universidad de Londres detalla que los niños son capaces de reconocer el rostro de sus padres a partir de los 2 meses de nacido.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' La bandera de México está constituida por tres colores, donde el color verde representa la esperanza de cada uno de los habitantes del pueblo, el color blanco la pureza del mexicano y por último el color rojo que es el más importante ya que representa la sangre de todos los muertos en la batalla.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Chihuahua, el estado más grande de México tiene una extensión territorial mayor que la de Reino Unido.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' ¿Sabías que México cuenta con el volcán mas pequeño del mundo? Esta en la ciudad de Puebla, se llama Cuexcomate y desde hace tiempo es un volcán inactivo que tan solo mide 13 metros de altura.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Los jaguares tienen tanta potencia en sus mandíbulas que matan a sus presas mordiendo directamente su cabeza, llegando al cerebro a través del craneo.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Usain Bolt no comió más que alitas de pollo durante los juego de Beijing, porque era “lo único que conocía“. Aún así, gano 3 medallas de oro.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' La hembra de lobo siempre se coloca bajo el macho en una situación de peligro. Mientras puede parecer que está asustada, realmente protege el cuello del macho para evitar que lo ataquen.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Esto se dijo sobre Thomas Edison: “No tenía hobbies, no se emocionaba por nada y despreciaba las reglas más elementales de higiene”.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' En el videojuego Super Mario Bros, los arbustos son nubes pintadas de color verde.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' En 2007, el CEO de Microsoft dijo: “No hay ninguna opción de que el iPhone vaya a tener una significancia en el mercado”.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' El primer cajero automático fue considerado un fracaso, ya que solo era usado por prostitutas y apostadores.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' En 2011, todo el país de Armenia perdió el acceso a Internet durante 12 horas después de que una mujer en Georgia rompiera una línea de fibra con su pala.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Hubo más nazis muertos a manos de los rusos en la batalla de Stalingrado que los que fueron matados durante toda la Segunda Guerra Mundial por los Estados Unidos.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' En 1981, el Papa Juan Pablo II sobrevivió a varios disparos desde corta distancia. Fue a visitar a la cárcel a quien intentó ser su verdugo, Alí Agca, y lo perdonó. Agca ha regresado recientemente al lugar de los hechos para colocar flores en la tumba del Papa.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' Hay una ciudad en Alaska con 217 residentes y todos viven en el mismo edificio de 14 pisos. Incluye una escuela, hospital, iglesia, y un supermercado.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

DB::table('frases')->insert([
            'frase'=> ' La actual CEO de YouTube, Susan Wojcicki, es la mujer que alquiló el garaje de Larry Page y Sergey Brin en 1998 cuando estaban creando Google.',
            'created_at' => date("Y-m-d H:i:s")
        ]);


    }
}
