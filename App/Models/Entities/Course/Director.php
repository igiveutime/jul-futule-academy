<?php

namespace App\Models\Entities\Course;

class Director
{
    protected $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function build($data = []): Course
    {
        return $this->builder
            ->reset()
            ->setId($data['id'])
            ->setName($data['name'])
            ->setShortTitle($data['short_title'])
            ->setShortDescription($data['short_description'])
            ->setTrainingPeriod($data['training_period'])
            ->setScheduleDays($data['schedule_days'])
            ->setScheduleHours($data['schedule_hours'])
            ->setPrice($data['price'])
            ->setFreeLessonsQty($data['free_lessons_qty'])
            ->setOwlText($data['owl_text'])
            ->setGoal1($data['goal1'])
            ->setGoal2($data['goal2'])
            ->setGoal3($data['goal3'])
            ->setGoal4($data['goal4'])
            ->setVideoLink($data['video_link'])
            ->setFullTitle($data['full_title'])
            ->setFullDescription($data['full_description'])
            ->setFeature1($data['feature1'])
            ->setFeature2($data['feature2'])
            ->setFeature3($data['feature3'])
            ->setFeature4($data['feature4'])
            ->setFeature5($data['feature5'])
            ->setFeature6($data['feature6'])
            ->setBenefitLeft($data['benefit_left'])
            ->setBenefitRight($data['benefit_right'])
            ->getEntity();
    }
}
