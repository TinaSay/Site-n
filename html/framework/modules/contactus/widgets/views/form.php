<?php
/**
 * Created by PhpStorm.
 * User: nsign
 * Date: 23.02.18
 * Time: 16:59
 */

/** @var $model app\modules\contactus\models\ContactusForm */

use app\modules\contactus\assets\YandexMapAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

YandexMapAsset::register($this);

?>

<div id="morphsearch" class="morphsearch">
    <div class="morphsearch-content">
        <div class="page-wrap">
            <?php $form = ActiveForm::begin([
                'id' => 'form-autorization',
                'action' => ['/contactus/default/index'],
                'options' => [
                    'enctype' => 'multipart/form-data',
                ],
            ]); ?>

            <?= Html::activeHiddenInput($model, 'country', ['id' => 'contactus-country']) ?>
            <?= Html::activeHiddenInput($model, 'city', ['id' => 'contactus-city']) ?>

            <div class="dummy-column">
                <div class="fild-wrap">
                    <span class="input input--hoshi">
                        <?= Html::activeInput('text', $model, 'name',
                            ['class' => 'input__field input__field--hoshi field-required']) ?>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    <span class="input__label-content input__label-content--hoshi">
                                        <span class="placehold">Представьтесь</span>
                                        <span class="error-message">Пожалуйста, представьтесь</span>
                                    </span>
                                </label>
                    </span>
                </div>
            </div>

            <div class="dummy-column">
                <div class="fild-wrap">
                     <span class="input input--hoshi">

                         <?= Html::activeInput('text', $model, 'contacts',
                             ['class' => 'input__field input__field--hoshi field-required']) ?>
                         <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                   <span class="input__label-content input__label-content--hoshi">
                                        <span class="placehold">Как с Вами связаться?</span>
                                        <span class="error-message">Пожалуйста, укажите Ваши контакты</span>
                                   </span>
                         </label>

                    </span>
                </div>
            </div>

            <div class="dummy-column-full">
                <div class="fild-wrap">
                    <span class="input input--hoshi">

                        <?= Html::activeInput('textarea()', $model, 'message',
                            ['class' => 'input__field input__field--hoshi field-required']) ?>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                          <span class="input__label-content input__label-content--hoshi">
                            <span class="placehold">Расскажите кратко о Вашем проекте</span>
                            <span class="error-message"></span>
                          </span>
                        </label>
                    </span>
                </div>
                <div class="fild-wrap fild-file">
                    <?= Html::activeInput('file', $model, 'file', ['hidden' => 'hidden']) ?>
                    <span class="input input--hoshi">
                    <input class="input__field input__field--hoshi" type="text" readonly="readonly"/>
                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content input__label-content--hoshi">
                        <span class="placehold">При необходимости прикрепите файл</span>
                        <span class="succses-message">Прикрепленный файл</span>
                      </span>
                    </label>
                    <span class="icon-file"><span></span>+</span>
                  </span>
                </div>
            </div>


            <div class="dummy-column-full">
                <div class="btn-wrap">
                    <div class="checkbox-wrap">
                        <input id="checkbox1" type="checkbox" name="checkbox" value="1" class="field-required"><label
                                for="checkbox1"><span></span>Даю своё согласие на обработку персональных данных</label>
                    </div>

                    <?= Html::submitButton('ОТПРАВИТЬ',
                        [
                            'class' => 'btn-send button button--aylen button--text-thick button--text-upper button--round-l progress-button',
                            'data-vertical' => true,
                        ]
                    ) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
            <div class="form-message">
                <h2 class="section-title">ЗАЯВКА ОТПРАВЛЕНА</h2>
                <p class="sub-title">В БЛИЖАЙШЕЕ ВРЕМЯ МЫ СВЯЖЕМСЯ С ВАМИ.</p>
            </div>
        </div>
    </div><!-- /morphsearch-content -->
    <span class="morphsearch-close"></span>
</div><!-- /morphsearch -->


<script>
    (function () {

        // modal form
        var pageWrap = $('#ip-container'),
            modalWindow = $('#morphsearch'),
            modalContent = $('.morphsearch-content');

        $('.morphsearch-open').on('click', function () {
            pageWrap.addClass('modal-open');
            setTimeout(function () {
                modalContent.addClass('open');
                modalWindow.find('input.input__field.input__field--hoshi.field-required:eq(0)').focus();
            }, 300);

        });

        $('.morphsearch-close').on('click', function () {
            pageWrap.removeClass('modal-open');
            $('.morphsearch-content').removeClass('open');
            clearTimeout(massegeTime);
            restForm(document.getElementById('form-autorization'));
            modalWindow.removeClass('message-view');
        });

        function restForm(form) {
            form.reset();
            $('.icon-file').removeClass('clear-file');
            $('.input.input--hoshi').removeClass('input--filled');
            $('.input.input--hoshi').removeClass('succses');
            $('.btn-send').removeClass('border');
        }

        var interval, progress, massegeTime;

        new ProgressButton(document.querySelector('button.progress-button'), {
            callback: function (instance) {
                if (formAuthValidate.valid()) {
                    sendForm(instance);
                    $('.morphsearch-close').css('display', 'none');
                } else {
                    modalContent.scrollTop(0)
                    instance._enable();
                }
            }
        });

        $('#form-autorization').submit(function () {
            return false;
        });

        function sendForm(instance) {
            var form = $('#form-autorization');
            var data = new FormData,
                method = $(form).attr('method'),
                action = $(form).attr('action');

            form.find(':input').each(function (index, elem) {
                var $input = $(elem);
                if (!$input.attr('name')) {
                    return true;
                }
                if ($input.attr('type') === 'file') {
                    data.append($input.attr('name'), $input.prop('files')[0])
                } else {

                    data.append($input.attr('name'), $input.val())
                }
            });

            function successSend() {
                if (progress === 1) {
                    var timeKey = true;
                    modalWindow.addClass('message-view');
                    $('.morphsearch-close').css('display', 'block');
                    instance._stop();
                    clearInterval(interval);
                    massegeTime = setTimeout(function () {
                        restForm(document.getElementById('form-autorization'));
                        modalWindow.removeClass('message-view');
                        pageWrap.removeClass('modal-open');
                        modalContent.removeClass('open');
                    }, 6000);
                } else {
                    setTimeout(function () {
                        successSend();
                    }, 500);
                }
            }

            function errorSend() {
                if (progress === 1) {
                    instance._stop();
                    clearInterval(interval);
                }
            }

            $.ajax({
                type: 'POST',
                url: action,
                data: data,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    progress = 0;
                    interval = setInterval(function () {
                        progress = Math.min(progress + Math.random() * 0.1, 1);
                        instance._setProgress(progress);
                    }, 100);
                },
                complete: function (jqXHR, status) {
                    if (status === 'success') {
                        successSend();
                    } else {
                        errorSend();
                    }
                }
            });
        }

        function formValidate(form) {
            this.form = form;
            this.input = form.find('input.field-required');
            this.checkbox = form.find('input[type="checkbox"]');
            this.validInp = false;
            this.validCheck = false;
            this.pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

            var that = this;

            this.input.on('change', function () {
                that.validade(this);
            });

            this.input.on('input', function () {
                if (formAuthValidate.checkVal()) {
                    $('.btn-send').addClass('border');
                } else {
                    $('.btn-send').removeClass('border');
                }
            });

            this.validade = function (input) {
                var ellForm = $(input).parent(),
                    type = $(input).attr('type'),
                    val = $(input).val();

                (val) ? ellForm.removeClass('error') : ellForm.addClass('error');
            };

            this.valid = function () {
                if (that.checkbox.prop('checked')) {
                    that.checkbox.parent().removeClass('error');
                    that.validCheck = true;
                } else {
                    that.checkbox.parent().addClass('error');
                    that.validCheck = false;
                }

                that.validInp = true;

                Array.prototype.forEach.call(that.input, function (ell) {
                    var ellForm = $(ell).parent(),
                        type = $(ell).attr('type'),
                        val = $(ell).val();
                    if (type == 'text') {
                        if (val) {
                            ellForm.removeClass('error')
                        } else {
                            ellForm.addClass('error');
                            that.validInp = false;
                        }
                    }
                });

                if (that.validCheck && that.validInp) {
                    return true;
                } else {
                    return false;
                }
            };
            this.checkVal = function () {
                var valid = true;
                Array.prototype.forEach.call(that.input, function (ell) {
                    var ellForm = $(ell).parent(),
                        type = $(ell).attr('type'),
                        val = $(ell).val();
                    if (type == 'text') {
                        if (!val) valid = false;
                    }
                });
                return valid;
            };
        }

        var formAuthValidate = new formValidate($('#form-autorization'));

    })();
</script>