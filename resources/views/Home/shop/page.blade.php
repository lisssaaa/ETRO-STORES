              <ul class="products-loop row grid clearfix ajax">
                
                  @foreach($goods as $value)
                  <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 post-255 product type-product status-publish has-post-thumbnail product_cat-electronics product_cat-home-appliances product_cat-vacuum-cleaner product_brand-apoteket first instock sale featured shipping-taxable purchasable product-type-simple">
                    <div class="products-entry item-wrap clearfix">
                      <div class="item-detail">
                        <div class="item-img products-thumb">
                          <span class="onsale">打折!</span>
                          <a href="/shop/{{$value->id}}">
                            <div class="product-thumb-hover">
                              <img width="300" height="300" src="/uploads/goods/{{$value->pic}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="/uploads/goods/{{$value->pic}} 300w, /uploads/goods/{{$value->pic}} 150w, /uploads/goods/{{$value->pic}} 180w, /uploads/goods/{{$value->pic}} 600w" sizes="(max-width: 300px) 100vw, 300px">
                            </div>
                          </a>
                                        
                          <!-- 表格视图 -->
                          <div class="item-bottom clearfix">
                            <a onclick="addcart({{$value->id}})" rel="nofollow" href="javascript:void(0)" class="button product_type_simple" title="">加入购物车</a>                            
                            
                            <div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
                              <div class="yith-wcwl-add-button show" style="display:block">
                                <a onclick="addwish({{$value->id}})" href="javascript:void(0)" rel="nofollow">添加收藏夹</a>
                                <!-- <img src="/static/home/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" /> -->
                              </div>
                             
                            </div>
                            
                          </div>
                        </div>
                        
                        <div class="item-content products-content">
                          <div class="reviews-content">
                            <div class="star"><span style="width: 70px"></span></div>
                          </div>
                          
                          <h4><a href="simple_product.html" title="">{{$value->name}}</a></h4>
                          
                          <span class="item-price"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">￥</span>{{$value->price+100}}</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">￥</span>{{$value->price}}</span></ins></span>
                          
                          <div class="item-description">{{$value->descr}}</div>
                        </div>
                      </div>
                    </div>
                  </li>
                  @endforeach 
                </ul>