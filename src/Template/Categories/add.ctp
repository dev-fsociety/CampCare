<div class="large-2 medium-3 columns" id="blank"><br></div>
<div class="categories form large-8 medium-6 columns content" style="margin-top:5%;">
        <?= $this->Form->create($category) ?>
        <div class="large-2 medium-3 columns" id="blank"><br></div>
        <div class="large-8 medium-6 columns text-center" id="blank">
                <fieldset>
                    <h4 class="text-center"> Add a category </h4>
                    <?php
                        echo $this->Form->input('name');
                        echo $this->Form->input('category_id', [ 'options' => $categories, 'empty' => true]);
                        echo $this->Form->hidden('camp_id', ['type' => 'number' , 'default' => $camp]);
                    ?>
                </fieldset>
        <?= $this->Form->button(__('Submit'), ['class' => 'button large']) ?>
        </div>
        <div class="large-2 medium-3 columns" id="blank"><br></div>
                <?= $this->Form->end() ?>
</div>
<div class="large-2 medium-3 columns" id="blank"><br></div>
