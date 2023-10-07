#include <stdio.h>


int main(){

	
	float celcius;
	// scan disini untuk menerima data dari operator
	printf("input celcius:");
	scanf("%f", &celcius);
	//disini kita akan merubah celcius menjadi farenheit menggunakan rumusnya yaitu cel.9/4+32
	float farh = celcius * 9/5 + 32;
	//disini kita akan merubah celcius menjadi reamur menggunakan rumusnya yaitu cel.4/5
	float reamur = celcius * 4/5 ;
	
	printf("%.2f, celcius:", celcius); // code di samping untuk menampilkan variabel celcius
	printf("%.2f, farenheit \n", farh);// code di samping untuk menampilkan variabel farh diatas
	
	printf("%.2f celcius:", celcius);// code di samping untuk menampilkan variabel celcius
	printf("%.2f reamur \n", reamur);// code di samping untuk menampilkan variabel farh diatas
	
	return 0;	
}
