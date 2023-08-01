{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Letter categories" icon="la la-mail-bulk" :link="backpack_url('letter-category')" />
<!-- <x-backpack::menu-item title="Incoming mails" icon="la la-question" :link="backpack_url('incoming-mail')" /> -->
<x-backpack::menu-item title="Mails" icon="la la-envelope-open" :link="backpack_url('mail')" />