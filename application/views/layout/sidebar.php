<div class="page-sidebar">
  <ul class="list-unstyled accordion-menu">
    <li class="sidebar-title">
      Main
    </li>
    <li class="<?php echo ($this->uri->segment(1) == 'dashboard') ? 'active-page' : ''; ?>">
      <a href="<?php echo base_url('dashboard'); ?>"><i data-feather="home"></i>Dashboard</a>
    </li>
    <li class="sidebar-title">
      Airdrop
    </li>
    <li class="<?php echo ($this->uri->segment(1) == 'Airdrop' && $this->uri->segment(2) == 'Add') ? 'active-page' : ''; ?>">
      <a href="<?php echo base_url('Airdrop/Add'); ?>"><i data-feather="calendar"></i>Add Airdrops</a>
    </li>
    <li class="<?php echo ($this->uri->segment(1) == 'Airdrop' && $this->uri->segment(2) == 'List') ? 'active-page' : ''; ?>">
      <a href="<?php echo base_url('Airdrop/List'); ?>"><i data-feather="inbox"></i>List Airdrop</a>
    </li>
  </ul>
</div>
<div class="page-content">