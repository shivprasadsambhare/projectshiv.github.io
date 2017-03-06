import java.io.*;
import java.util.*;

class count
{

int funCount()
{
int ct=0;


try{
BufferedReader br=new BufferedReader(new InputStreamReader(System.in));
String str=br.readLine();

	StringTokenizer st1=new StringTokenizer(str,".?!");

	 while(st1.hasMoreTokens())
		 {
			String s=st1.nextToken();

  String[] result = s.split("\\s+");
					

			if(result.length>ct)
			{
				ct=result.length;
			}			
		
		}



}catch(Exception e){System.out.println(e);}


return ct;
}

public static void main(String[] args)
{

count c=new count();
System.out.println("Maximum Number of words in a sentence:"+c.funCount());

}
}