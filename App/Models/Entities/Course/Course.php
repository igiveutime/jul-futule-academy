<?php

namespace App\Models\Entities\Course;

use App\Models\Entities\EntityAbstract;

class Course extends EntityAbstract
{
    protected $name;
    protected $shortTitle;
    protected $shortDescription;
    protected $trainingPeriod;
    protected $scheduleDays;
    protected $scheduleHours;
    protected $price;
    protected $freeLessonsQty;
    protected $owlText;
    protected $goal1;
    protected $goal2;
    protected $goal3;
    protected $goal4;
    protected $videoLink;
    protected $fullTitle;
    protected $fullDescription;
    protected $feature1;
    protected $feature2;
    protected $feature3;
    protected $feature4;
    protected $feature5;
    protected $feature6;
    protected $benefitLeft;
    protected $benefitRight;

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setShortTitle(?string $shortTitle): self
    {
        $this->shortTitle = $shortTitle;

        return $this;
    }

    public function getShortTitle(): ?string
    {
        return $this->shortTitle;
    }

    public function setShortDescription(?string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setTrainingPeriod(?int $trainingPeriod): self
    {
        $this->trainingPeriod = $trainingPeriod;

        return $this;
    }

    public function getTrainingPeriod(): ?int
    {
        return $this->trainingPeriod;
    }

    public function setScheduleDays(?int $scheduleDays): self
    {
        $this->scheduleDays = $scheduleDays;

        return $this;
    }

    public function getScheduleDays(): ?int
    {
        return $this->scheduleDays;
    }

    public function setScheduleHours(?int $scheduleHours): self
    {
        $this->scheduleHours = $scheduleHours;

        return $this;
    }

    public function getScheduleHours(): ?int
    {
        return $this->scheduleHours;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setFreeLessonsQty(?int $freeLessonsQty): self
    {
        $this->freeLessonsQty = $freeLessonsQty;

        return $this;
    }

    public function getFreeLessonsQty(): ?int
    {
        return $this->freeLessonsQty;
    }

    public function setOwlText(?string $owlText): self
    {
        $this->owlText = $owlText;

        return $this;
    }

    public function getOwlText(): ?int
    {
        return $this->owlText;
    }

    public function setGoal1(?string $goal1): self
    {
        $this->goal1 = $goal1;

        return $this;
    }

    public function getGoal1(): ?string
    {
        return $this->goal1;
    }

    public function setGoal2(?string $goal2): self
    {
        $this->goal2 = $goal2;

        return $this;
    }

    public function getGoal2(): ?string
    {
        return $this->goal2;
    }

    public function setGoal3(?string $goal3): self
    {
        $this->goal3 = $goal3;

        return $this;
    }

    public function getGoal3(): ?string
    {
        return $this->goal3;
    }

    public function setGoal4(?string $goal4): self
    {
        $this->goal4 = $goal4;

        return $this;
    }

    public function getGoal4(): ?string
    {
        return $this->goal4;
    }

    public function setVideoLink(?string $videoLink): self
    {
        $this->videoLink = $videoLink;

        return $this;
    }

    public function getVideoLink(): ?string
    {
        return $this->videoLink;
    }

    public function setFullTitle(?string $fullTitle): self
    {
        $this->fullTitle = $fullTitle;

        return $this;
    }

    public function getFullTitle(): ?string
    {
        return $this->fullTitle;
    }

    public function setFullDescription(?string $fullDescription): self
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    public function getFullDescription(): ?string
    {
        return $this->fullDescription;
    }

    public function setFeature1(?string $feature1): self
    {
        $this->feature1 = $feature1;

        return $this;
    }

    public function getFeature1(): ?string
    {
        return $this->feature1;
    }

    public function setFeature2(?string $feature2): self
    {
        $this->feature2 = $feature2;

        return $this;
    }

    public function getFeature2(): ?string
    {
        return $this->feature2;
    }

    public function setFeature3(?string $feature3): self
    {
        $this->feature3 = $feature3;

        return $this;
    }

    public function getFeature3(): ?string
    {
        return $this->feature3;
    }

    public function setFeature4(?string $feature4): self
    {
        $this->feature4 = $feature4;

        return $this;
    }

    public function getFeature4(): ?string
    {
        return $this->feature4;
    }

    public function setFeature5(?string $feature5): self
    {
        $this->feature5 = $feature5;

        return $this;
    }

    public function getFeature5(): ?string
    {
        return $this->feature5;
    }

    public function setFeature6(?string $feature6): self
    {
        $this->feature6 = $feature6;

        return $this;
    }

    public function getFeature6(): ?string
    {
        return $this->feature6;
    }

    public function setBenefitLeft(?string $benefitLeft): self
    {
        $this->benefitLeft = $benefitLeft;

        return $this;
    }

    public function getBenefitLeft(): ?string
    {
        return $this->benefitLeft;
    }

    public function setBenefitRight(?string $benefitRight): self
    {
        $this->benefitRight = $benefitRight;

        return $this;
    }

    public function getBenefitRight(): ?string
    {
        return $this->benefitRight;
    }
}
