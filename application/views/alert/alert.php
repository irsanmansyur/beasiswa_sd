<?php if ($this->session->flashdata('message')) : ?>
	<div class="alert alert-success"><?= $this->session->flashdata('message'); ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('success')) : ?>
	<div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('danger')) : ?>
	<div class="alert alert-danger"><?= $this->session->flashdata('danger'); ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('warning')) : ?>
	<div class="alert alert-warning"><?= $this->session->flashdata('warning'); ?></div>
<?php endif; ?>
