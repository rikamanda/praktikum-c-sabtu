#include<stdio.h>
int main()
{
	int jam_masuk, jam_keluar, hasil;
	
	printf("jam masuk :");
	scanf("%i",&jam_masuk);
	
	printf("jam keluar");
	scanf("%i",&jam_keluar);
	
	if ((1 <= jam_masuk && jam_masuk <= 12) && (1 <= jam_keluar && jam_keluar <= 12)) { 
             if (jam_keluar >= jam_masuk) { 
                 hasil = jam_keluar - jam_masuk; 
             } else { 
                 hasil = (jam_keluar + 12) - jam_masuk; 
             } 
         };	
		printf("lama bekerja adalah:%i",hasil);
		
		return 1;
	
	
}
