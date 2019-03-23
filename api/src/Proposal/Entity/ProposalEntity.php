<?php

namespace ProposiDocs\Proposal\Entity;

class ProposalEntity {

	private $title;
	private $description;
	private $price;
	private $id;

	private $isOpen;
	private $isSigned;
	private $isDeclined;

	public function __construct(string $title, string $description, string $price) {
		$this->title = $title;
		$this->description = $description;
		$this->price = $price;
		$this->id = rand(1, 50000);

		$this->isOpen = false;
		$this->isSigned = false;
		$this->isDeclined = false;
	}

	public function getTitle(): string {
		return $this->title;
	}

	public function getDescription(): string {
		return $this->description;
	}

	public function getPrice(): string {
		return $this->price;
	}

	public function getId(): int {
		return $this->id;
	}

	public function isOpen(): bool {
		return $this->isOpen;
	}

	public function open()
	{
		$this->isOpen = true;
		return $this;
	}

	public function isSigned()
	{
		return $this->isSigned;
	}

	public function sign()
	{
		$this->isSigned = true;
		$this->isDeclined = false;

		return $this;
	}

	public function isDeclined()
	{
		return $this->isDeclined;
	}

	public function decline()
	{
		$this->isDeclined = true;
		$this->isSigned = false;

		return $this;
	}
}
