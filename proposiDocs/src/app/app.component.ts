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
    //_contract = ['henrique','eduardo','rafael','Cleiver','Fernando'];
    _contract = [
      {

        subject:'Proposta X',
        description:'Era uma vez uma proposta',
        mail: 'proposify@proposify.com',
        price: 1510.00,
        isOpened:false,
        isSigned:true

    },
    {

      subject:'Proposta Y',
      description:'tea te easasass',
      mail: 'someone@proposify.com',
      price: 230.00,
      isOpened:true,
      isSigned:true

  },
  {

    subject:'Proposta Z',
    description:'teste teste tesr',
    mail: 'me@proposify.com',
    price: 450.00,
    isOpened:false,
    isSigned:false

}
  ]


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
