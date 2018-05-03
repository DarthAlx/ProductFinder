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

        DB::table('tiendas')->insert([
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
        ]);

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

    }
}
