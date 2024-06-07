<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Question;
use \App\Models\Subject;
class QuestionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Question';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Question());

        $grid->column('id', __('Id'));
        // $grid->column('subject_id', __('Subject id'));

        
        
        $grid->column('subject_id', __('Subject'))->expand(function ($model) {

            return $model->subject->title;
        });

        


        // $grid->column('subject_id', __('Subject id'));
        $grid->column('question', __('Question'));
        $grid->column('option1', __('Option1'));
        $grid->column('option2', __('Option2'));
        $grid->column('option3', __('Option3'));
        $grid->column('option4', __('Option4'));
        $grid->column('answer', __('Answer'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Question::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('subject_id', __('Subject id'));
        $show->field('question', __('Question'));
        $show->field('option1', __('Option1'));
        $show->field('option2', __('Option2'));
        $show->field('option3', __('Option3'));
        $show->field('option4', __('Option4'));
        $show->field('answer', __('Answer'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Question());

        $form->select('subject_id', __("Subject"))->options(Subject::all()->pluck('title', 'id'));

        // $form->text('subject_id', __('Subject id'));
        $form->textarea('question', __('Question'));
        $form->text('option1', __('Option1'));
        $form->text('option2', __('Option2'));
        $form->text('option3', __('Option3'));
        $form->text('option4', __('Option4'));
        $form->text('answer', __('Answer'));

        return $form;
    }
}
