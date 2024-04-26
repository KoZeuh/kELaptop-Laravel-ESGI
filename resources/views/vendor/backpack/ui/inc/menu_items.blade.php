{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Brands" icon="la la-question" :link="backpack_url('brand')" />
<x-backpack::menu-item title="Carts" icon="la la-question" :link="backpack_url('cart')" />
<x-backpack::menu-item title="Categories" icon="la la-question" :link="backpack_url('category')" />
<x-backpack::menu-item title="Orders" icon="la la-question" :link="backpack_url('order')" />
<x-backpack::menu-item title="Order items" icon="la la-question" :link="backpack_url('order-item')" />
<x-backpack::menu-item title="Products" icon="la la-question" :link="backpack_url('product')" />
<x-backpack::menu-item title="Product images" icon="la la-question" :link="backpack_url('product-image')" />
<x-backpack::menu-item title="Product reviews" icon="la la-question" :link="backpack_url('product-review')" />
<x-backpack::menu-item title="Promo codes" icon="la la-question" :link="backpack_url('promo-code')" />
<x-backpack::menu-item title="Stocks" icon="la la-question" :link="backpack_url('stock')" />
<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />