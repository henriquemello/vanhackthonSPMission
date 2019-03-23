<?php

namespace ProposiDocs\Proposal\Entity;

class ProposalEntity {

	private $title;
	private $description;
	private $price;
	private $id;

	public function __construct(string $title, string $description, string $price) {
		$this->title = $title;
		$this->description = $description;
		$this->price = $price;
		$this->id = rand(1, 50000);
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


}
