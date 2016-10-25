<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bookmarks'), ['controller' => 'Bookmarks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bookmark'), ['controller' => 'Bookmarks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Uploads'), ['controller' => 'Uploads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Upload'), ['controller' => 'Uploads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user, array('type' => 'file')) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('firstname');
            echo $this->Form->input('lastname');
            echo $this->Html->image('/files/Users/photo/'.$this->viewVars['user']['photo']);
            echo $this->Form->input('photo', array('type' => 'file'));
        ?>
    </fieldset>
    <fieldset>
        <legend>User images</legend>
        <?php
            $uploads = $this->viewVars['user']['uploads'];

            echo $this->Form->input('uploads.0.photo', ['type' => 'file', 'multiple']);
            echo '<label class="form button" for="uploads-0-photo">Upload mehrere Bilder durch AJAX</label>';

            $index = 1;
            foreach ($uploads as $key => $upload) {
                if ($upload['dir'].$upload['attachment'] != '') {
                    echo $this->Html->image($upload['dir'].$upload['attachment']);
                }
                echo '<table>
                    <tr>
                        <td>'.$this->Form->input('uploads.'.$index.'.photo', ['type' => 'file', 'multiple']).'</td>
                    </tr>
                </table>';

                $index++;
            }
        ?>
    </fieldset>


    <label class="form button" for="photo">Upload Bild durch AJAX</label>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>



<script>

    $("[name^='upload']").change(function () {
        var formData = new FormData();

        $($(this)[0].files).each(function (key, file) {
            formData.append('uploads['+key+'][photo]', file);
        });
        $.ajax({
               url : '/users/ajaxUploadSeparatedFile',
               type : 'POST',
               data : formData,
               processData: false,  // tell jQuery not to process the data
               contentType: false,  // tell jQuery not to set contentType
               success : function(data) {
                   alert('Reload the page to see the changes');
               }
        });
    });

    $('#photo').change(function () {
        var formData = new FormData();
        formData.append('photo', $('#photo')[0].files[0]);

        $.ajax({
               url : '/users/ajaxUploadFile',
               type : 'POST',
               data : formData,
               processData: false,  // tell jQuery not to process the data
               contentType: false,  // tell jQuery not to set contentType
               success : function(data) {
                   alert('Reload the page to see the changes');
               }
        });
    });
</script>
