
<h1 class="text-center" style="color: #444; margin-top: 2%; margin-bottom:2%;">Please select an item below</h1>

<div class="large-1 medium-1 columns"><br></div>
  <div class="columns small-up-10 medium-up-10 large-10">
    <?php $counter = 0;?>
    <?php foreach ($items as $item): ?>
	    <!-- if right camp -->
	    <?php $sclass = "square square-color" . (string)($counter%4) ?>
      <?php $rclass = "row bycat row-color" . (string)($counter%4) ?>

      <a href=<?php echo "../process/" . $item->id; ?> >
        <div class="<?php echo $rclass; ?>" style="background-color: #DEDEDE;">
  	      <div class="column large-3 medium-3 small-3 text-center square-container">
            <div class="<?php echo $sclass; ?>">
              <div class="square-content"><?= h($item->name) ?></div>
            </div>
          </div>
          <div class="column large-3 medium-3 small-3"></div>
          <div class="column large-6 medium-6 small-6">
            <div class="cat-desc">
              <?= h($item->category) ?>
              <?= $this->Text->autoParagraph(h($item->description)); ?>
            </div>
          </div>
        </div>
        </a>
        <br>
	  <?php $counter++;?>
    <?php endforeach; ?>
  </div>
<div class="large-1 medium-1 columns"><br></div>
