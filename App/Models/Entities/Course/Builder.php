<?php

namespace App\Models\Entities\Course;

use App\Models\Entities\EntityBuilderAbstract;
use App\Models\Entities\EntityFactory;

class Builder extends EntityBuilderAbstract
{
    public function __construct(\App\Models\Entities\EntityFactory $entityFactory)
    {
        parent::__construct($entityFactory, EntityFactory::COURSE);
    }

    public function reset(): self
    {
        $this->entity = $this->entityFactory->createEntity(EntityFactory::COURSE);

        return $this;
    }

    public function setName(?string $name): self
    {
        $this->entity->setName($name);

        return $this;
    }

    public function setShortTitle(?string $shortTitle): self
    {
        $this->entity->setShortTitle($shortTitle);

        return $this;
    }

    public function setShortDescription(?string $shortDescription): self
    {
        $this->entity->setShortDescription($shortDescription);

        return $this;
    }

    public function setTrainingPeriod(?int $trainingPeriod): self
    {
        $this->entity->setTrainingPeriod($trainingPeriod);

        return $this;
    }

    public function setScheduleDays(?int $scheduleDays): self
    {
        $this->entity->setScheduleDays($scheduleDays);

        return $this;
    }

    public function setScheduleHours(?int $scheduleHours): self
    {
        $this->entity->setScheduleHours($scheduleHours);

        return $this;
    }

    public function setPrice(?int $price): self
    {
        $this->entity->setPrice($price);

        return $this;
    }

    public function setFreeLessonsQty(?int $freeLessonsQty): self
    {
        $this->entity->setFreeLessonsQty($freeLessonsQty);

        return $this;
    }

    public function setOwlText(?string $owlText): self
    {
        $this->entity->setOwlText($owlText);

        return $this;
    }

    public function setGoal1(?string $goal1): self
    {
        $this->entity->setGoal1($goal1);

        return $this;
    }

    public function setGoal2(?string $goal2): self
    {
        $this->entity->setGoal2($goal2);

        return $this;
    }

    public function setGoal3(?string $goal3): self
    {
        $this->entity->setGoal3($goal3);

        return $this;
    }

    public function setGoal4(?string $goal4): self
    {
        $this->entity->setGoal4($goal4);

        return $this;
    }

    public function setVideoLink(?string $videoLink): self
    {
        $this->entity->setVideoLink($videoLink);

        return $this;
    }

    public function setFullTitle(?string $fullTitle): self
    {
        $this->entity->setFullTitle($fullTitle);

        return $this;
    }

    public function setFullDescription(?string $fullDescription): self
    {
        $this->entity->setFullDescription($fullDescription);

        return $this;
    }

    public function setFeature1(?string $feature1): self
    {
        $this->entity->setFeature1($feature1);

        return $this;
    }

    public function setFeature2(?string $feature2): self
    {
        $this->entity->setFeature2($feature2);

        return $this;
    }

    public function setFeature3(?string $feature3): self
    {
        $this->entity->setFeature3($feature3);

        return $this;
    }

    public function setFeature4(?string $feature4): self
    {
        $this->entity->setFeature4($feature4);

        return $this;
    }

    public function setFeature5(?string $feature5): self
    {
        $this->entity->setFeature5($feature5);

        return $this;
    }

    public function setFeature6(?string $feature6): self
    {
        $this->entity->setFeature6($feature6);

        return $this;
    }

    public function setBenefitLeft(?string $benefitLeft): self
    {
        $this->entity->setBenefitLeft($benefitLeft);

        return $this;
    }

    public function setBenefitRight(?string $benefitRight): self
    {
        $this->entity->setBenefitRight($benefitRight);

        return $this;
    }
}
