import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-message',
  templateUrl: './message.component.html',
  styleUrls: ['./message.component.css'],
  inputs:['textMessage']
})
export class MessageComponent implements OnInit {

	//@Input
	textMessage: string = ''

  constructor() { }

  _isShowed: boolean = false

  ngOnInit() {
  }

}
