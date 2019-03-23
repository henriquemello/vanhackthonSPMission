import { Component, OnInit } from '@angular/core';
import { ContractService } from './contract.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent{
  title = 'proposiDocs';

  constructor(private _contract: ContractService){

    _contract = null;


    // ngOnInit(){
      
    // }

    // getProposals(){
    //   this._contract.getProposals().subscribe(
    //     result => this._contract = result
    //   );
    // }


    

  }
}
