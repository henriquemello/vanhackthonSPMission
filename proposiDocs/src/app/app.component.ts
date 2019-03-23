import { Component, OnInit } from '@angular/core';
import { ContractService } from './contract.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit{
  title = 'proposiDocs';
   

  constructor(private _contractService: ContractService){ }

    //_contract =null;
    _contract = ['henrique','eduardo','rafael','Cleiver','Fernando'];


    ngOnInit(){
      this.getProposals();
    }
 

    getProposals(){
      // this._contractService.getProposals().subscribe(
      //   result => this._contract = result
      // );

      return this._contract;
 
    }
}
