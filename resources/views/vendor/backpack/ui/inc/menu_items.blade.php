{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Commandes" icon="la la-box" :link="backpack_url('order')" />
<x-backpack::menu-item title="Détail Commandes" icon="la la-boxes" :link="backpack_url('order-item')" />

<x-backpack::menu-item title="Stock" icon="la la-pallet" :link="backpack_url('stock')" />

<x-backpack::menu-item title="Produits" icon="la la-archive" :link="backpack_url('product')" />
<x-backpack::menu-item title="Images de produit" icon="la la-photo-video" :link="backpack_url('product-image')" />
<x-backpack::menu-item title="Avis" icon="la la-question" :link="backpack_url('product-review')" />
<x-backpack::menu-item title="Code Promo" icon="la la-percentage" :link="backpack_url('promo-code')" />

<x-backpack::menu-item title="Marques" icon="la la-tv" :link="backpack_url('brand')" />
<x-backpack::menu-item title="Catégories" icon="la la-tag" :link="backpack_url('category')" />
<x-backpack::menu-item title="Utilisateurs" icon="la la-user-tag" :link="backpack_url('user')" />