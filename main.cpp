#include <iostream>
#include <list>
#include <vector>
#include <fstream>
#include <string>
#include <sstream>
#include <climits>
#include <stdlib.h>
#include <time.h>
#include <pthread.h>
#include <stdio.h>

using namespace std;

float ferInicial = 0.01;
float rho = 0.07;
float reforco = 0.001;
int const qntFormigas = 10, nexec = 1, maxIt = 100, const_Q=0.01;
int vinicial =4,vfinal = 94, tdsCustos[nexec][qntFormigas], custosExpCorrente[maxIt][qntFormigas], tamMat = 0, ind_melhor=0;

void imprimeMatriz(float mat[][3], int tamMat) {
    for(int j = 0; j < tamMat ; j++) {
        for(int i = 0; i < 3; i++)
            cout << mat[j][i] << "         ";
        cout << endl;
    }
}

__global__ void inicializaFeromonios(float *feros) {
    int i = threadIdx.x;
    if(i < tamMat)
        feros[i] = ferInicial;
}

void inicializaVetor(int vet[],int tam){

    for (int i=0; i< tam ;i++){
        vet[i] = -1;
    }
}

void inserirVetor(int vet[],int valor, int tam){
     for (int i=0; i<tam;i++){
        if(vet[i]==-1){
            vet[i] = valor;
            break;
        }
    }

}

void removeVetor(int vet[],int pos, int tam){

    if (pos <= tam){

        if(pos+1 == tam){
            vet[pos] = -1;
        }else{

            vet[pos] = vet[pos+1];

            for (int i=pos+1; i<tam ; i++){

                if(i+1 == tam){
                     vet[i] = -1;
                }else{
                    if (vet[i]!=-1){
                        vet[i]= vet[i+1];
                    }else{
                        break;
                    }
                }
            }
        }
    }
}

int tamCaminho(int vet[], int tam){

  for (int i=0; i<tam;i++){
        if(vet[i]==-1){
            return i;
        }
    }
}

void imprimeVetor(int vet[],int tam){

    cout << "Caminho: ";
    for (int i=0; i<tam ;i++){
        if (vet[i]!=-1){
        cout << vet[i] << "-";
        }
    }
}

void encontra(float mat[][3], int vatual, int retorno[], int tam) {
    int j = 0;
    while(j < tamMat) {

        if(mat[j][0] == vatual){
            inserirVetor(retorno,j,tam);
            }
        j++;
    }
}


int main() {

// LEITURA DO ARQUIVO

    srand((unsigned)time(0));

    fstream arquivo;
    string leitura;
    int i = 0, j = 0, aux, nVertices;;
    stringstream s;


    arquivo.open("grafo2.txt", ios::in);


    if(arquivo.is_open()) {
        arquivo >> leitura;
        s.str(leitura);
        s >> nVertices;
    }

    float matriz[nVertices*(nVertices-1)][3];

    while(arquivo >> leitura) {
        s.seekg(0, ios_base::beg);
        s.str(leitura);
        s >> matriz[j][i];
        i++;
        if(i > 2) {
            i = 0;
            j++;
            tamMat++;
        }
    }

//imprimeMatriz(matriz, tamMat);

// IMPLEMENTAÇÃO COLONIA DE FORMIGAS

    int ind_vatual[nVertices], caminho[nVertices], ind_origens[nVertices],ind_remove[nVertices];
    int caminhos[qntFormigas][nVertices];
    int vatual, it, n, x, ind_peso= 0, ind_fero=0;
    float soma = 0, custos[qntFormigas], porcent, custo, menorCusto=LONG_MAX;
    float *feros;
    cudaMallocManaged(&feros, tamMat);
    bool fim, cvalido;


    for(int nexp = 0; nexp < nexec; nexp++) {

        inicializaFeromonios<<<1,100>>>(feros);
        it = 0;
        while(it < maxIt) {
            n = 0;

            for (int i=0; i<qntFormigas; i++){
                inicializaVetor(caminhos[i],nVertices);
            }

            while (n < qntFormigas) {
                inicializaVetor(caminho, nVertices);
                vatual  = vinicial;
                fim = false;
                cvalido = true;
                while(fim == false) {

                    inserirVetor(caminho,vatual, nVertices);
                    inicializaVetor(ind_vatual, nVertices);
                    inicializaVetor(ind_remove, nVertices);

                    encontra(matriz, vatual, ind_vatual, nVertices);

                    for (int k=0; k < tamCaminho(ind_vatual,nVertices); k++ ) {
                        for(int p = 0; p < tamCaminho(caminho,nVertices); p++) {
                            if (caminho[p] == matriz[ind_vatual[k]][1]) {
                               inserirVetor(ind_remove,k, nVertices);
                            }
                        }
                    }


                    if (tamCaminho(ind_remove,nVertices)!=0) {
                        for(int i=tamCaminho(ind_remove,nVertices)-1; i >=0 ; i--) {
                            removeVetor(ind_vatual,ind_remove[i],nVertices);

                        }
                    }

                    if (tamCaminho(ind_vatual, nVertices) == 0) {
                        n = n-1;
                        fim = true;
                        cvalido = false;

                    } else {


                        float prob[tamCaminho(ind_vatual,nVertices)];
                        soma = 0;

                        for (int k = 0 ; k <tamCaminho(ind_vatual,nVertices); k++) {

                            prob[k] = (1/matriz[ind_vatual[k]][2])*feros[ind_vatual[k]];

                            soma = soma + prob[k];
                        }

                        for (int k=0; k <tamCaminho(ind_vatual,nVertices); k++) {
                            if (k==0) {
                                prob[k]=prob[k]/soma;
                            } else {
                                prob[k]= (prob[k-1]) + (prob[k]/soma);
                            }

                        }

                        porcent = rand()%99;
                        porcent = porcent/100;

                        int ind_caminho = 0;

                        while(porcent > prob[ind_caminho]) {
                            ind_caminho = ind_caminho + 1;
                        }

                        vatual = matriz[ind_vatual[ind_caminho]][1];

                        if (vatual == vfinal) {
                            fim = true;
                            inserirVetor(caminho, vatual,nVertices);

                        }
                    }
                }

                if (cvalido == true) {

                    custo = 0;

                    for( int k=0; k < tamCaminho(caminho,nVertices)-1; k++) {
                        inicializaVetor(ind_origens,nVertices);
                        encontra(matriz, caminho[k], ind_origens,nVertices);



                        for (int j=0; tamCaminho(ind_origens,nVertices); j++) {
                            if (matriz[ind_origens[j]][1] == caminho[k+1]) {
                                ind_peso = ind_origens[j];
                                break;
                            }
                        }
                        custo = custo + matriz[ind_peso][2];
                    }
                      for (int j=0; j<nVertices;j++){
                        inserirVetor(caminhos[n],caminho[j],nVertices);
                    }

                    if (custo <= menorCusto) {
                        menorCusto = custo;
                        ind_melhor = n;
                    }

                    custos[n] = custo;
                }
                n = n+1;

            }


            for (int i=0; i< tamMat; i++) {
                feros[i] = (1-rho)*feros[i];
            }

            for (int m=0; m <qntFormigas; m++) {

                for(int l=0; l<tamCaminho(caminhos[m],nVertices) - 1; l++) {
                    inicializaVetor(ind_origens,nVertices);
                    encontra(matriz, caminhos[m][l], ind_origens,nVertices);
                    for(int j = 0; j < tamCaminho(ind_origens,nVertices); j++) {
                        if (matriz[ind_origens[j]][1] == caminhos[m][l+1]) {
                            ind_fero = ind_origens[j];
                            break;
                        }
                    }

                    feros[ind_fero] = (const_Q/custos[m]) + feros[ind_fero];

                    if (m == ind_melhor) {
                        feros[ind_fero] = reforco + feros[ind_fero];
                    }
                }
            }
            it = it+1;
        }

        for (int z=0; z<qntFormigas; z++) {
            tdsCustos [nexp][z] = custos[z];
        }

        for (int k = 0; k<qntFormigas; k++) {
            cout<< "Formiga"<< k << ": ";
            imprimeVetor(caminhos[k],nVertices);

            cout<< "> Custo: "<< custos[k];
            cout<<endl;
        }

    }
}

