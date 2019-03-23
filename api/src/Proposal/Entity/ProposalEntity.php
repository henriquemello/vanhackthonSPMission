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

	public function toArray() {
		return [
			'id' => $this->getId(),
			'subject' => $this->getTitle(),
			'description' => $this->getDescription(),
			'price' => $this->getPrice(),
			'isOpened' => $this->isOpen(),
			'isSigned' => $this->isSigned(),
			'isDeclined' => $this->isDeclined(),
		];
	}

	public static function createFromArray(array $data): ProposalEntity {
		$instance = new self($data['title'], $data['description'], $data['price']);
		$instance->id = $data['id'];
		$instance->isOpen = (bool) $data['is_open'];
		$instance->isSigned = (bool) $data['is_signed'];
		$instance->isDeclined = (bool) $data['is_declined'];
		return $instance;
	}
}
