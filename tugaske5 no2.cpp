#include<stdio.h>
int main()
{
 
	int kode, harga, DISKON;
	char jenis;
	float  hasil_setelah_diskon;
	
	printf("memasukkan jenis");
	scanf("%c",&jenis);
	
	printf("memasukkan harga");
	scanf("%i",&harga);
	
	printf("memasukkan kode");
	scanf("%i",& kode);
	
	
	switch(jenis){
		case'A':DISKON =10;
		break;
		case'B':DISKON =15;
		break;
		case'C': DISKON =25;
		break;
		default:
			printf("jenis barang tidak");
			
			return 1;		
	}
	hasil_setelah_diskon=harga-(harga*DISKON/100);
	printf("jenis barang : %c\n harga setelah diskon adalah:%f", jenis,hasil_setelah_diskon );
    return 0;
}


    
