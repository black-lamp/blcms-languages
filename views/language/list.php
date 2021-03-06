<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Languages';

?>

<!-- LANGUAGES -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>
                    <i class="glyphicon glyphicon-globe"></i>
                    Languages list
                </h5>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Language</th>
                            <th>Code</th>
                            <th class="text-center">Active</th>
                            <th class="text-center">Show</th>
                            <th class="text-center">Default</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!empty($languages)): ?>
                            <?php foreach ($languages as $lang): ?>
                                <tr>
                                    <td><?= $lang->name ?></td>
                                    <td><?= $lang->lang_id ?></td>
                                    <td class="text-center">
                                        <a href="<?= Url::to(['language/switch-active', 'id' => $lang->id]) ?>">
                                            <?php if ($lang->active > 0): ?>
                                                <i class="glyphicon glyphicon-ok text-success"></i>
                                            <?php else: ?>
                                                <i class="glyphicon glyphicon-remove text-danger"></i>
                                            <?php endif; ?>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= Url::to(['language/switch-show', 'id' => $lang->id]) ?>">
                                            <?php if ($lang->show > 0): ?>
                                                <i class="glyphicon glyphicon-ok text-success"></i>
                                            <?php else: ?>
                                                <i class="glyphicon glyphicon-remove text-danger"></i>
                                            <?php endif; ?>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= Url::to(['language/switch-default', 'id' => $lang->id]) ?>">
                                            <?php if ($lang->default > 0): ?>
                                                <i class="glyphicon glyphicon-ok text-success"></i>
                                            <?php else: ?>
                                                <i class="glyphicon glyphicon-remove text-danger"></i>
                                            <?php endif; ?>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?=Url::to(['language/delete', 'id' => $lang->id])?>" class="glyphicon glyphicon-remove text-danger"></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">
                                    There is no languages found
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#addLanguagePopup">
                    <i class="glyphicon glyphicon-plus"></i> Add
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</div>

<!-- Create Language Modal -->

<div class="modal fade" id="addLanguagePopup" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php $createLangForm = ActiveForm::begin(['action' => Url::to(['language/create']), 'method' => 'post']) ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><i class="glyphicon glyphicon-user"></i> Add new language</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?= $createLangForm->field($createLanguageForm, 'name', [
                        'inputOptions' => [
                            'class' => 'form-control'
                        ]
                    ])->label('Name')
                    ?>
                </div>
                <div class="form-group">
                    <?= $createLangForm->field($createLanguageForm, 'lang_id', [
                        'inputOptions' => [
                            'class' => 'form-control'
                        ]
                    ])->label('Code')
                    ?>
                </div>
                <?= Html::activeCheckbox($createLanguageForm, 'active') ?>
                <?= Html::activeCheckbox($createLanguageForm, 'show') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary pull-right" value="Add">
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
